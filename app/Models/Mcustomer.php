<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Observers\McustomerObserver;
class Mcustomer extends Model
{
    use HasFactory, Notifiable, HasRoles;
    public $table = 'm_customer';
    public $primaryKey = 'customer_id';
    
    public $fillable = [
        'customer_name',
        'address1',
        'address2',
        'emirsal_code',
        'city',
        'country',
    ];
    
    public static function boot() {
        parent::boot();
        parent::observe(new McustomerObserver);
    }
}
