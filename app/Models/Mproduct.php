<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Observers\MproductObserver;

class Mproduct extends Model
{
    use HasFactory, Notifiable, HasRoles;
	
    public $table = 'm_product';
    public $primaryKey = 'mpid';
    
    public $fillable = [
        'category',
        'brand',
        'model_no',
        'model_name',
        'hscode',
        'color',
    ];
    
    public static function boot() {
        parent::boot();
        parent::observe(new MproductObserver);
    }
}
