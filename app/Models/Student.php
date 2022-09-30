<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'student';

    protected $fillable = [
        'student_regno',
        'first_name',
        'last_name',
        'program_id',
        'year_level',
        'finger_template',
        'userid'
    ];
}
