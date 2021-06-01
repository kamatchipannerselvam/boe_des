<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Observers\InbgwObserver;

class Inbgw extends Model
{
    use HasFactory, Notifiable, HasRoles;
	
    public $table = 'inb_gw_info';
    public $primaryKey = 'inbgwinfoid';
    
    public $fillable = [
		'inbdocinfoid',
        'hscode',
        'coo_code',
        'tqty',
        'tprice',
        'gw',
        'o_pugw',
        'a_pugw',
    ];
    
    public static function boot() {
        parent::boot();
        parent::observe(new InbgwObserver);
    }
}
