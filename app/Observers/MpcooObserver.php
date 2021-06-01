<?php
namespace App\Observers;
use App\Models\Mpcoo;
class MpcooObserver {
    public function creating(Mpcoo $model) {
        return $model->created_by = auth()->user()->id;
    }
}