<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Observers\ReceiveboeinbObserver;

class Receiveboeinb extends Model
{
    use HasFactory, Notifiable, HasRoles;
	
    public $table = 'inb_doc_info';
    public $primaryKey = 'inbdocinfoid';
    public $timestamps = true;    
    //protected $dateFormat = 'U';
    
    public $fillable = [
        'boe_date',
        'boe_number',
        'vendor_name',
        'currency',
        'invoice_no',
        'invoice_date',
        'dc_status'
    ];
    
    public static function boot() {
        parent::boot();
        parent::observe(new ReceiveboeinbObserver);
    }
}
