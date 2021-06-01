<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mpcoo;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MpcooImport;
use App\Exports\MpcooExport;

class MpcooController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:mpcoo-list|mpcoo-create|mpcoo-edit|mpcoo-delete', ['only' => ['index','show']]);
         $this->middleware('permission:mpcoo-create', ['only' => ['create','store']]);
         $this->middleware('permission:mpcoo-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:mpcoo-delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mpcoos = Mpcoo::latest()->paginate(25);
        return view('mpcoos.index',compact('mpcoos'))
            ->with('i', (request()->input('page', 1) - 1) * 25);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mpcoos.create'); //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'short_code' => 'sometimes|required|unique:m_coo|max:10',
            'name' => 'required',
        ]);
        Mpcoo::create($request->all());
        return redirect()->route('mpcoos.index')
                        ->with('success','COO created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mproduct  $mproduct
     * @return \Illuminate\Http\Response
     */
    public function show(Mpcoo $mpcoo)
    {
        return view('mpcoos.show',compact('mpcoo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mproduct  $mproduct
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           $mpcoo = Mpcoo::FindorFail($id);
           return view('mpcoos.edit',compact('mpcoo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mproduct  $mproduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mpcoo = Mpcoo::FindorFail($id);
        $mpcoo->update($request->all());
        return redirect()->route('mpcoos.index')
                        ->with('success','COO updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mproduct  $mproduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mpcoo $mpcoo)
    {
        $mpcoo->delete();
    
        return redirect()->route('mpcoos.index')
                        ->with('success','COO deleted successfully');
    }
    
    
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImportExport()
    {
       return view('mpcoos.file-import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request) 
    {
        Excel::import(new MpcooImport, $request->file('file')->store('temp'));
        return redirect()->route('mpcoos.index')
                        ->with('success','Products uploaded successfully.');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport() 
    {
        return Excel::download(new MpcooExport, 'COO-collection.xlsx');
    }
    
    public function getCoo(Request $request){
        $cname=$request->input('searchTerm');
        if($cname!=""){
        $searchterm=$cname."%";
            $mcus=Mpcoo::where("name","like",$searchterm)->get();
        }
        else{
            $mcus=Mpcoo::all();
        }
        foreach ($mcus as $mcustomer) {
        $currencylist[]=array("id"=>$mcustomer->short_code, "text"=>$mcustomer->short_code);
        }
        return json_encode($currencylist);
    }
    
}
