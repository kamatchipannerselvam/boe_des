<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Observers\InbstockObserver;

class Inbstock extends Model
{
    use HasFactory, Notifiable, HasRoles;
	
    public $table = 'inb_stock_info';
    public $primaryKey = 'inbstockinfoid';
    public $timestamps = true;
    //protected $dateFormat = 'U';
    protected $dates = [
        'created_at',
        'updated_at'
        ];	
    public $fillable = [
	'inbdocinfoid',
        'pdt_id',
        'hscode',
        'coo_code',
        'qty',
        'unit_price',
        'total_price',
    ];
    
    public static function boot() {
        parent::boot();
        parent::observe(new InbstockObserver);
    }
}