<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mpcur;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MpcurImport;
use App\Exports\MpcurExport;

class MpcurController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:mpcur-list|mpcur-create|mpcur-edit|mpcur-delete', ['only' => ['index','show']]);
         $this->middleware('permission:mpcur-create', ['only' => ['create','store']]);
         $this->middleware('permission:mpcur-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:mpcur-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mpcurs = Mpcur::latest()->paginate(25);
        return view('mpcurs.index',compact('mpcurs'))
            ->with('i', (request()->input('page', 1) - 1) * 25);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mpcurs.create'); //
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
            'short_code' => 'sometimes|required|unique:m_currency|max:10',
            'name' => 'required',
        ]);
        Mpcur::create($request->all());
        return redirect()->route('mpcurs.index')
                        ->with('success','Currency created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mpcur  $mpcur
     * @return \Illuminate\Http\Response
     */
    public function show(Mpcur $mpcur)
    {
        return view('mpcurs.show',compact('mpcur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mpcur  $mpcur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           $mpcur = Mpcur::FindorFail($id);
           return view('mpcurs.edit',compact('mpcur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mpcur  $mpcur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mpcur = Mpcur::FindorFail($id);
        $mpcur->update($request->all());
        return redirect()->route('mpcurs.index')
                        ->with('success','Currency updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mpcur  $mpcur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mpcur $mpcur)
    {
        $mpcur->delete();
    
        return redirect()->route('mpcurs.index')
                        ->with('success','Currency deleted successfully');
    }
    
    
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImportExport()
    {
       return view('mpcurs.file-import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request) 
    {
        Excel::import(new MpcurImport, $request->file('file')->store('temp'));
        return redirect()->route('mpcurs.index')
                        ->with('success','Currency uploaded successfully.');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport() 
    {
        return Excel::download(new MpcurExport, 'Currency-collections.xlsx');
    }
    
    public function getCurrency(Request $request){
        $cname=$request->input('searchTerm');
        $currencylist=array();
        if($cname!=""){
        $searchterm=$cname."%";
        $mcus=Mpcur::where("name","like",$searchterm)->get();    
        }
        else{
        $mcus=Mpcur::all();
        }
        foreach ($mcus as $mcustomer) {
        $currencylist[]=array("id"=>$mcustomer->short_code, "text"=>$mcustomer->short_code);
        }
        return json_encode($currencylist);
    }
}
