<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'subject',
        'department',
        'year',
        'semester',
        'teacher',
    ];
}
