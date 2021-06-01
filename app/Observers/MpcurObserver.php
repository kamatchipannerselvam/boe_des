<?php
namespace App\Observers;
use App\Models\Mpcur;
class MpcurObserver {
    public function creating(Mpcur $model) {
        return $model->created_by = auth()->user()->id;
    }
}