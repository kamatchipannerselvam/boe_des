<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Observers\ObstockinfoObserver;

class Obstockreq extends Model
{
    use HasFactory, Notifiable, HasRoles;
	
    public $table = 'ob_stock_req';
    public $primaryKey = 'obstockreqid';
    public $timestamps = true;
    //protected $dateFormat = 'U';
    
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    
    public $fillable = [
	'inbstockinfoid',
        'pdt_id',
        'hscode',
        'coo_code',
        'rqty',
	'gw',
	'request_status',
    ];
    
    public static function boot() {
        parent::boot();
        parent::observe(new ObstockinfoObserver);
    }
}
