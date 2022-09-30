<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $table='session';
    protected $fillable =[
        'activity_name',
        'venueid',
        'course_id',
        'program_id',
        'date',
        'start_time',
        'end_time',
        'year_level'
    ];
    
}
