<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'exam_id',
        'exam_name',
        'question',
        'op_1',
        'op_2',
        'op_3',
        'op_4',
        'r_op',
        'teacher_id',
        'teacher',
    ];
}
