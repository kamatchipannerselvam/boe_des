<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Contact extends Model
{
    use HasFactory, Notifiable;
    
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'job_title',
        'city',
        'country',
    ];
    
}
