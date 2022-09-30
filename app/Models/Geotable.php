<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geotable extends Model
{
    use HasFactory;
    protected $table = 'geotable';

    protected $fillable = [
        'venue_id',
        'min_lat',
        'max_lat',
        'min_long',
        'max_long',
    ];
}
