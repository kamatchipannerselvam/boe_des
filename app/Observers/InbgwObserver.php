<?php
namespace App\Observers;
use App\Models\Inbgw;
class InbgwObserver{
    public function creating(InbgwObserver $model) {
        $model->created_by = auth()->user()->id;
        return $model;
    }
    
}