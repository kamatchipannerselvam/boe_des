<?php
namespace App\Observers;
use App\Models\Obstockreq;
class ObstockinfoObserver
{
    public function creating(Obstockreq $model) {
        $model->created_by = auth()->user()->id;
        return $model;
    }
    public function updating(Obstockreq $model){
        $model->updated_by = auth()->user()->id;
        return $model;
    }
}
