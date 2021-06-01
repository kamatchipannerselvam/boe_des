<?php
namespace App\Observers;
use App\Models\Mproduct;
class MproductObserver {
    public function creating(Mproduct $model) {
        return $model->created_by = auth()->user()->id;
    }
}