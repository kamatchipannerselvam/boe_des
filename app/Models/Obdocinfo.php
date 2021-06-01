<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Observers\ObdocinfoObserver;

class Obdocinfo extends Model
{
    use HasFactory, Notifiable, HasRoles;
	
    public $table = 'ob_doc_info';
    public $primaryKey = 'obdocinfoid';
    public $timestamps = true;
    //protected $dateFormat = 'U';
    protected $dates = [
        'created_at',
        'updated_at'
        ];
    public $fillable = [
		'obdocinfoid',
		'refno',
        'customer_name',
        'transferto',
        'currency',
        'ob_status',
    ];
    
    public static function boot() {
        parent::boot();
        parent::observe(new ObdocinfoObserver);
    }

}
