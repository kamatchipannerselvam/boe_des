<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mproduct;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MproductsImport;
use App\Exports\MproductsExport;

class MproductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:mproduct-list|mproduct-create|mproduct-edit|mproduct-delete', ['only' => ['index','show']]);
         $this->middleware('permission:mproduct-create', ['only' => ['create','store']]);
         $this->middleware('permission:mproduct-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:mproduct-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mproducts = Mproduct::latest()->paginate(100000);
        return view('mproducts.index',compact('mproducts'))
            ->with('i', (request()->input('page', 1) - 1) * 100000);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mproducts.create'); //
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
            'category' => 'required',
            'brand' => 'required',
            'model_no' => 'required|unique:m_product',
            'model_name' => 'required',
            'hscode' => 'required',
            'color'=>'nullable',
        ]);
        //$inputparams=$request->all();
        Mproduct::firstOrCreate($request->all());
        return redirect()->route('mproducts.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mproduct  $mproduct
     * @return \Illuminate\Http\Response
     */
    public function show(Mproduct $mproduct)
    {
        return view('mproducts.show',compact('mproduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mproduct  $mproduct
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           $mproduct = Mproduct::FindorFail($id);
           return view('mproducts.edit',compact('mproduct'));           
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
        $mproduct = Mproduct::FindorFail($id);
        $mproduct->update($request->all());
        return redirect()->route('mproducts.index')
                        ->with('success','Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mproduct  $mproduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mproduct $mproduct)
    {
        $mproduct->delete();
    
        return redirect()->route('mproducts.index')
                        ->with('success','Product deleted successfully');
    }
    
    
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImportExport()
    {
       return view('mproducts.file-import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request) 
    {
        Excel::import(new MproductsImport, $request->file('file')->store('temp'));
        return redirect()->route('mproducts.index')
                        ->with('success','Products uploaded successfully.');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport() 
    {
        return Excel::download(new MproductsExport, 'item-collection.xlsx');
    }
    
    public function getProducts(Request $request){
        $modelno=$request->input('searchTerm');
        $modellist=array();
        if($modelno!=""){
        $searchterm=$modelno."%";
        $mcus=Mproduct::where("model_no","like",$searchterm)->get();
        }
        else{
        $mcus=Mproduct::all();
        }
        foreach ($mcus as $mcustomer) {
        $modellist[]=array("id"=>$mcustomer->mpid, "text"=>$mcustomer->model_no." (".$mcustomer->model_name.")");
        }
        return json_encode($modellist);
    }
    
    public function getProductdetails(Request $request){
        $itemid=$request->input('itemId');
        if($itemid!=""){
            $mcus=Mproduct::where("mpid","=",$itemid)->first();
            return json_encode(array('status'=>'success','data'=>$mcus));
        }
        else{
            return json_encode(array('status'=>'error'));
        }
    }
    
}
