<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table = 'teacher';

    protected $fillable = [
        'staff_no',
        'first_name',
        'last_name',
        'mobile',
        'userid',
    ];
}

