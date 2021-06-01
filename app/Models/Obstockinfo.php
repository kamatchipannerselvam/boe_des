<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Observers\ObstockinfoObserver;

class Obstockinfo extends Model
{
    use HasFactory, Notifiable, HasRoles;
	
    public $table = 'ob_stock_info';
    public $primaryKey = 'obstockinfoid';
    public $timestamps = true;
    //protected $dateFormat = 'U';
    protected $dates = [
        'created_at',
        'updated_at'
        ];
    public $fillable = [
		'obstockinfoid',
		'inbstockinfoid',
        'pdt_id',
        'hscode',
        'coo_code',
        'rqty',
		'gw',
        'sellingprice',
        'linetotal',
		'ob_status'
    ];
    
    public static function boot() {
        parent::boot();
        parent::observe(new ObstockinfoObserver);
    }
	
}