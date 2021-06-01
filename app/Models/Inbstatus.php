<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Observers\InbstatusObserver;

class Inbstatus extends Model
{
    use HasFactory, Notifiable, HasRoles;
	
    public $table = 'inb_doc_status';
    public $primaryKey = 'inbdocstatusid';
    
    public $fillable = [
		'inbdocinfoid',
        'total_qty',
        'total_value',
        'total_gw',
        'boe_passed_by',
        'airway_bill_no',
        'submission_date',
        'remarks',
        'doc_status',
    ];
    
    public static function boot() {
        parent::boot();
        parent::observe(new InbstatusObserver);
    }
}