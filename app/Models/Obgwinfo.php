<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Observers\ObgwObserver;

class Obgwinfo extends Model
{
    use HasFactory, Notifiable, HasRoles;
	
    public $table = 'ob_gw_info';
    public $primaryKey = 'obgwinfoid';
    
    public $fillable = [
		'obdocinfoid',
        'hscode',
        'coo_code',
        'qty',
        'gw',
        'gw',
        'price',
        'lineamount',
		'ob_status'
    ];
    
    public static function boot() {
        parent::boot();
        parent::observe(new ObgwObserver);
    }
}
