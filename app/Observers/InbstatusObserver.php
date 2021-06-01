<?php
namespace App\Observers;
use App\Models\Inbstatus;
class InbstatusObserver{
    public function creating(Inbstatus $model) {
        $model->created_by = auth()->user()->id;
        return $model;
    }
}