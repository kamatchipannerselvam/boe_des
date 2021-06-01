<?php
namespace App\Observers;
use App\Models\Receiveboeinb;
class ReceiveboeinbObserver {
    public function creating(Receiveboeinb $model) {
        $model->created_by = auth()->user()->id;
        $lastrecord=Receiveboeinb::latest()->first();
        if(null!==$lastrecord){
        $refarr=explode("/",$lastrecord->refno);
        $refarrno=(int)$refarr[count($refarr)-1];
        $refarrno++;
        }
        else{
        $refarrno=1;
        }
        $model->refno="BOEINB/".date('dmY')."/".str_pad($refarrno,5,0,STR_PAD_LEFT);
        return $model;
    }
}