<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffCourse extends Model
{
    use HasFactory;
    
    protected $table = 'staffcourse';

    protected $fillable = [
        'staff_id',
        'program_id',
        'course_code',       
        'year_level',       
    ];
}
