<?php
namespace App\Http\Controllers;

use App\Models\Mcustomer;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\McustomerImport;
use App\Exports\McustomerExport;

class McustomersController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:mcustomer-list|mcustomer-create|mcustomer-edit|mcustomer-delete', ['only' => ['index','show']]);
         $this->middleware('permission:mcustomer-create', ['only' => ['create','store']]);
         $this->middleware('permission:mcustomer-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:mcustomer-delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mcustomers = Mcustomer::latest()->paginate(100000);
        return view('mcustomers.index',compact('mcustomers'))
            ->with('i', (request()->input('page', 1) - 1) * 25);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mcustomers.create');
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
            'customer_name'=>'required',
            'address1'=>'nullable',
            'address2'=>'nullable',
            'emirsal_code'=>'required',
            'city'=>'nullable',
            'country'=>'nullable',
        ]);
        Mcustomer::create($request->all());
        return redirect()->route('mcustomers.index')
                        ->with('success','Customer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mcustomer  $mcustomer
     * @return \Illuminate\Http\Response
     */
    public function show(Mcustomer $mcustomer)
    {
        return view('mcustomers.show',compact('mcustomers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mcustomer  $mcustomer
     * @return \Illuminate\Http\Response
     */
    public function edit(Mcustomer $mcustomer)
    {
           $mcustomers = Mcustomer::Findorfail($mcustomer->customer_id);
           return view('mcustomers.edit',compact('mcustomers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mcustomer  $mcustomer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mcustomer $mcustomer)
    {
        $mcustomers = Mcustomer::FindorFail($mcustomer->customer_id);
        $mcustomers->update($request->all());
        return redirect()->route('mcustomers.index')
                        ->with('success','Customers updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mcustomer  $mcustomer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mcustomer $mcustomer)
    {
        $mcustomer->delete();
        return redirect()->route('mcustomers.index')
                        ->with('success','Customer deleted successfully');
    }
    
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImportExport()
    {
       return view('mcustomers.file-import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request) 
    {
        Excel::import(new McustomerImport, $request->file('file')->store('temp'));
        return redirect()->route('mcustomers.index')
                        ->with('success','Customer uploaded successfully.');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport() 
    {
        return Excel::download(new McustomerExport, 'Customer-collection.xlsx');
    }
    
    public function getCustomer(Request $request){
        $cname=$request->input('searchTerm');
        $customerlist=array();
        if($cname!=""){
        $searchterm=$cname."%";
        $mcus=Mcustomer::where("customer_name","like",$searchterm)->get();    
        }
        else{
        $mcus=Mcustomer::all();
        }
        foreach ($mcus as $mcustomer) {
        $customerlist[]=array("id"=>str_replace("'"," ",$mcustomer->customer_name), "text"=>$mcustomer->customer_name);
        }
        return json_encode($customerlist);
    }
}
