<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Observers\MpcurObserver;

class Mpcur extends Model
{
    use HasFactory, Notifiable, HasRoles;
	
    public $table = 'm_currency';
    public $primaryKey = 'curid';
    
    public $fillable = [
        'short_code',
        'name',
    ];
    
    public static function boot() {
        parent::boot();
        parent::observe(new MpcurObserver);
    }
}
