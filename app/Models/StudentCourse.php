<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    use HasFactory;
    
    protected $table = 'studentcourse';

    protected $fillable = [
        'program_id',
        'credits',
        'status',
        'course_code',       
        'year_level',       
    ];
}
