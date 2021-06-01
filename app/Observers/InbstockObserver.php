<?php
namespace App\Observers;
use App\Models\Inbstock;
class InbstockObserver {
    public function creating(Inbstock $model) {
        $model->created_by = auth()->user()->id;
        return $model;
    }
    public function updating(Inbstock $model){
        $model->updated_by = auth()->user()->id;
        return $model;
    }
}