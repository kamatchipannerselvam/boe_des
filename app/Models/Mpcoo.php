<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Observers\MpcooObserver;

class Mpcoo extends Model
{
    use HasFactory, Notifiable, HasRoles;
	
    public $table = 'm_coo';
    public $primaryKey = 'cooid';
    
    public $fillable = [
        'short_code',
        'name',
    ];
    
    public static function boot() {
        parent::boot();
        parent::observe(new MpcooObserver);
    }
}
