<?php
namespace App\Http\Controllers;

use App\Models\Receiveboeinb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class ReceiveboeinbController extends Controller
{
    
//    function __construct()
//    {
//         $this->middleware('permission:boeinb-list|boeinb-create|boeinb-edit|boeinb-delete', ['only' => ['index','show']]);
//         $this->middleware('permission:boeinb-create', ['only' => ['create','store']]);
//         $this->middleware('permission:boeinb-edit', ['only' => ['edit','update']]);
//         $this->middleware('permission:boeinb-delete', ['only' => ['destroy']]);
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*** available stocks for all boe ***/
        $docinfosts=DB::table(DB::raw("inb_stock_info t1"))
                ->select(DB::raw("t1.inbstockinfoid, t2.vendor_name, t2.boe_number, t3.category, t3.brand, t3.model_no, t3.model_name, t1.hscode, t1.coo_code,t3.color,t4.aqty qty"))
                ->join(DB::raw("inb_doc_info t2"), DB::raw("t2.inbdocinfoid"),DB::raw("="),DB::raw("t1.inbdocinfoid"))
                ->join(DB::raw("m_product t3"), DB::raw("t3.mpid"), DB::raw("="),DB::raw("t1.pdt_id"))
                ->join(DB::raw("availablestocks t4"), DB::raw("t4.inbstockinfoid"), DB::raw("="),DB::raw("t1.inbstockinfoid"))
                ->orderBy(DB::raw("t1.qty"),'asc')
                ->get();
        /****/
        $requestedstocks=\App\Models\Obstockreq::latest()->where('request_status','creating')->get();
        $reqqty=array();
        if(count($requestedstocks)>0){
            foreach($requestedstocks as $key=>$value){
                $reqqty[$value->inbstockinfoid]=$value->rqty;
            }
        }
        
        $finalarray=array();
        if(count($docinfosts)>0){
            foreach($docinfosts as $skey=>$stitem){
                $finalarray[$skey]=(array)$stitem;
                $finalarray[$skey]['rqty']=isset($reqqty[$stitem->inbstockinfoid])?$reqqty[$stitem->inbstockinfoid]:0;
            }
        }
        
        
        return view('boeinb.index',['finalarray'=>$finalarray]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * Document information's
     * @return \Illuminate\Http\Response
     */
    public function createStepOne()
    {
        /***
         * if draft available fetch draft details
         */
        $docinfoarray = Receiveboeinb::latest()->where('dc_status','=','draft')->first();
        $docinfo = $docinfoarray;
        return view('boeinb.form1',compact('docinfo', $docinfo));
    }
    
    /**
     * @param Request $request
     * @return type
     */
    public function postCreateStepOne(Request $request)
    {
        if(!$request->has('_token')) {
            return redirect('boeinb/stepone')
                             ->withErrors($validator)
                             ->withInput();
        }
       
        $validator = Validator::make($request->all(), [
            'boe_date' => 'required',
            'boe_number' => 'required',
            'vendor_name' => 'required',
            'currency' => 'required',
            'invoice_no' => 'nullable',
            'invoice_date'=>'nullable',
            'refno'=>'nullable',
            'dc_status'=>'nullable'
        ]);
        
        if($validator->fails()){ //echo "<pre>";
        return redirect('boeinb/stepone')
                 ->withErrors($validator)
                 ->withInput();
        }
        
        $inputparams=$request->all();
        $boedate=$inputparams['boe_date'];
        unset($inputparams['boe_date']);
        unset($inputparams['_token']);
        unset($inputparams['process-step']);
        unset($inputparams['submit']);
        $inputparams['dc_status']="draft";
        $inputparams['boe_date']=date('Y-m-d',strtotime($boedate));
        if(!is_null($inputparams['inbdocinfoid'])){
            $docinfo= Receiveboeinb::find($inputparams['inbdocinfoid']);
            foreach($inputparams as $dk=>$dv){
            $docinfo->$dk=$dv;
            }
            $docinfo->save();
            $refno=$docinfo->refno;
        }else{
            $refno=Receiveboeinb::firstOrCreate($inputparams)->refno;
        }
        return redirect()->route('boeinb.steptwo', ['step' => 2, 'refno' => base64_encode($refno)]);
    }
    
    /*******
     * item information's
     * get the item details already drafted for particular reference no
     */
    
    public function createStepTwo(Request $request)
    {
        $datainfo=$request->all();
        $refno=base64_decode($datainfo['refno']);
        $docinfoarray = Receiveboeinb::latest()->where('refno',$refno)->where('dc_status','draft')->first();
        if($docinfoarray){
            $stockinfo= \App\Models\Inbstock::latest()->where('dc_status','draft')
                    ->where('inbdocinfoid',$docinfoarray->inbdocinfoid)->get();
            return view('boeinb.form2',['step'=>2,'refno'=>$refno,'inbdocinfoid'=>$docinfoarray->inbdocinfoid, 'inbstocks'=>$stockinfo]);
        }
        else{
            return redirect()->route('boeinb.stepone');
        }
    }
    /***
     * store draft into invdocinfo table
     * grouped the info and insert into gwait table
     * SELECT inbstockinfoid, hscode, coo_code, sum(qty) tqty, sum(total_price) tprice, concat(0.0) gw, concat(0.0) o_pugw, concat(0.0) e_pugw, dc_status FROM `inb_stock_info` GROUP by coo_code, hscode, inbstockinfoid
     */
    public function postCreateStepTwo(Request $request)
    {
        
        $inpuparams=$request->all();
        $totalnoofitems=count($inpuparams['model_no']);
        $ctime=date("Y-m-d H:i:s");
        if($inpuparams['refno']!="" && $totalnoofitems>0){
                $docstockinfoarr=array();
                
                for($i=0;$i<$totalnoofitems;$i++){
                    $docstockinfo['inbdocinfoid']=$inpuparams['inbdocinfoid'];
                    $docstockinfo['pdt_id']=$inpuparams['model_no'][$i];
                    $docstockinfo['hscode']=$inpuparams['hscode'][$i];
                    $docstockinfo['coo_code']=$inpuparams['coo'][$i];
                    $docstockinfo['qty']=$inpuparams['qty'][$i];
                    $docstockinfo['unit_price']=$inpuparams['uprice'][$i];
                    $docstockinfo['total_price']=$inpuparams['tprice'][$i];
                    $docstockinfo['dc_status']="draft";
                    $docstockinfo['created_by']=auth()->user()->id;
                    $docstockinfo['created_at']=$ctime;
                    $docstockinfoarr[]=$docstockinfo;
                }
                //delete old items and insert new records
                DB::statement('delete from `inb_stock_info` where inbdocinfoid='.$inpuparams['inbdocinfoid']);
                /** multiple record insert one go ***/
                \App\Models\Inbstock::insert($docstockinfoarr);
               //delete old items and insert new records
                DB::statement('delete from `inb_gw_info` where inbdocinfoid='.$inpuparams['inbdocinfoid']);
                /**insert the grouped data into gw table ***/
                DB::statement('INSERT INTO inb_gw_info select * from(SELECT null inbgwinfoid, inbdocinfoid, hscode, coo_code, sum(qty) tqty, sum(total_price) '
                        . 'tprice, concat(0) gw, concat(0) o_pugw, concat(0) a_pugw, concat("draft") dc_status, created_by, created_at, null updated_by, null updated_at'
                        . ' FROM `inb_stock_info` where inbdocinfoid='.$inpuparams['inbdocinfoid'].' GROUP by hscode, coo_code)tmp ');
                
                return redirect()->route('boeinb.stepthree', ['step' => 3, 'refno' => base64_encode($inpuparams['refno'])]);
        }
        else{
            
            return redirect()->route('boeinb.stepone');
        }
    }
    
    /******
     * view and confirm the data generate document status
     */
    public function createStepThree(Request $request)
    {
        $datainfo=$request->all();
        $refno=base64_decode($datainfo['refno']);
        $docinfoarray = Receiveboeinb::latest()->where('refno',$refno)->where('dc_status','draft')->first();
        if($docinfoarray){
            $gwinfo= \App\Models\Inbgw::latest()->where('dc_status','draft')->where('inbdocinfoid',$docinfoarray->inbdocinfoid)->get();
            return view('boeinb.form3',['step'=>3,'refno'=>$refno,'inbdocinfoid'=>$docinfoarray->inbdocinfoid,'gwinfo'=>$gwinfo]);
        }
        else{
            return redirect()->route('boeinb.stepone');
        }
    }
    
    /**
    * @param Request $request
    * @return type
    */
    public function postCreateStepThree(Request $request)
    {
        //echo "<pre>"; //print_r($request->all()); //exit;
        $inpuparams=$request->all();
        $totalnoofitems=count($inpuparams['hscode']);
        $ctime=date("Y-m-d H:i:s");
        if($inpuparams['refno']!="" && $totalnoofitems>0){
            $inbdocinfoid=$inpuparams['inbdocinfoid'];
                for($i=0;$i<$totalnoofitems;$i++){
                    $hscode=$inpuparams['hscode'][$i];
                    $coo=$inpuparams['coo'][$i];
                    $gwinfo=\App\Models\Inbgw::latest()->where('hscode',$hscode)->where('coo_code',$coo)->where('inbdocinfoid',$inbdocinfoid)->first();
                    $gwinfo->gw=$inpuparams['tgw'][$i];
                    $gwinfo->o_pugw=$inpuparams['pu_gw'][$i];
                    $gwinfo->a_pugw=$inpuparams['pu_gw'][$i];
                    $gwinfo->dc_status="completed";
                    $gwinfo->updated_by=auth()->user()->id;
                    $gwinfo->updated_at=$ctime;
                    $gwinfo->update();
                }
                //update the inb_stock_info | inb_doc_info | status as completed
                DB::statement("update inb_stock_info SET dc_status='completed' where inbdocinfoid=$inbdocinfoid");
                //insert new record in inb_doc_status
                //SELECT inbdocinfoid, sum(tqty) total_qty, sum(tprice) total_value FROM inb_gw_info WHERE inbdocinfoid=1
                $docinfosts=DB::table('inb_gw_info')
                        ->select(DB::raw('inbdocinfoid, sum(tqty) total_qty, sum(tprice) total_value, sum(gw) total_gw'))
                        ->where('inbdocinfoid',$inbdocinfoid)
                        ->get()->toArray();
                $docinfo=$docinfosts[0];
                $inbdocsts=new \App\Models\Inbstatus();
                $inbdocsts->inbdocinfoid=$inbdocinfoid;
                $inbdocsts->total_qty=$docinfo->total_qty;
                $inbdocsts->total_value=$docinfo->total_value;
                $inbdocsts->total_gw=$docinfo->total_gw;
                $inbdocsts->dc_status="pending";
                $inbdocsts->created_by=auth()->user()->id;
                $inbdocsts->created_at=$ctime;
                $inbdocsts->save();
                DB::statement("update inb_doc_info SET dc_status='completed' where inbdocinfoid=$inbdocinfoid");
                return redirect()->route('boeinb.index');
        }
        else{
            return redirect()->route('boeinb.stepone');
        }
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Receiveboeinb  $receiveboeinb
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
     echo "welcome";    //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Receiveboeinb  $receiveboeinb
     * @return \Illuminate\Http\Response
     */
    public function edit(Receiveboeinb $receiveboeinb)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receiveboeinb  $receiveboeinb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receiveboeinb $receiveboeinb)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receiveboeinb  $receiveboeinb
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receiveboeinb $receiveboeinb)
    {
        //
    }
}