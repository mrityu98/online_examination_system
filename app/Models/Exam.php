<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'name',
        'subject',
        'department',
        'year',
        'semester',
        'date',
        'start_time',
        'duration',
        't_question',
        'teacher_id',
        'teacher',
    ];
}
