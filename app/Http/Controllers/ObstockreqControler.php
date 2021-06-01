<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obstockreq;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class ObstockreqControler extends Controller
{
    
public function createOrder(Request $request)
{
        //echo "<pre>";
        //print_r($request->all());
        //exit;
    
        $validator = Validator::make($request->all(), [
            'qty'=>'required',
            'stock_id'=>'required',
            'req_type'=>'required',
        ]);
        $inputparams=$request->all();
        if($validator->fails()){                //echo "<pre>";
            return json_encode($validator);
        }
        
        $inbstocks=DB::table(DB::raw("inb_stock_info t1"))
                ->select(DB::raw("t1.inbstockinfoid, t1.pdt_id, t1.hscode, t1.coo_code, t4.aqty qty"))
                ->join(DB::raw("inb_doc_info t2"), DB::raw("t2.inbdocinfoid"),DB::raw("="),DB::raw("t1.inbdocinfoid"))
                ->join(DB::raw("m_product t3"), DB::raw("t3.mpid"), DB::raw("="),DB::raw("t1.pdt_id"))
                ->join(DB::raw("availablestocks t4"), DB::raw("t4.inbstockinfoid"), DB::raw("="),DB::raw("t1.inbstockinfoid"))
                ->where(DB::raw("t1.inbstockinfoid"), "=", DB::raw($inputparams['stock_id']))
                ->orderBy(DB::raw("t1.qty"),'asc')
                ->get();
        $items=$inbstocks[0];
        if($inputparams['req_type']=="Order"){
            $remainingqty=$items->qty-$inputparams['qty'];
            if($remainingqty>0){
                $inputarray=array();
                $inputarray['obstockreqid']=null;
                $inputarray['inbstockinfoid']=$inputparams['stock_id'];
                $inputarray['pdt_id']=$items->pdt_id;
                $inputarray['hscode']=$items->hscode;
                $inputarray['coo_code']=$items->coo_code;
                $inputarray['rqty']=$inputparams['qty'];
                $inputarray['gw']=0.0;
                $inputarray['request_status']='Creating'; //Creating | Ordered 
                try {
                // DB query goes here.
                   Obstockreq::firstOrCreate($inputarray);
                   return json_encode(['status'=>'success','remainqty'=>$remainingqty]);
                } catch (QueryException $e) {
                // Logics in case there are QueryException goes here
                    return json_encode(['status'=>'error','message'=>"Something went Wrong"]);
                }
            }
            else{
                return json_encode(['status'=>'error','message'=>"You can order only lower or equal available Qty($inbstocks->qty) "]);
            }
        }
        elseif($inputparams['req_type']=="Delete"){
            $remainingqty=$items->qty+$inputparams['qty'];
            try {
                    // DB query goes here.
                Obstockreq::where('created_by','=',auth()->user()->id)
                        ->where('inbstockinfoid','=',$inputparams['stock_id'])
                        ->where('request_status','Creating')
                        ->delete();
                return json_encode(['status'=>'success','remainqty'=>$remainingqty]);
            } catch (QueryException $e) {
                // Logics in case there are QueryException goes here
                return json_encode(['status'=>'error','message'=>"Something went Wrong"]);
            }
        }
}

public function sendOrder(){

    return view('boeoutb.sendorder');
}

    
}
