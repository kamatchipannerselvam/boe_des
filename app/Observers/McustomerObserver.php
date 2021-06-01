<?php
namespace App\Observers;
use App\Models\Mcustomer;
class McustomerObserver {
    public function creating(Mcustomer $model) {
        return $model->created_by = auth()->user()->id;
    }
}