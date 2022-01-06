<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'user_id',
        'confirmed',
        'driving_license_no',
        'driving_license_front',
        'driving_license_back',
        'banned',
        'date_of_birth',
        'height',
        'creator',
        'slug',
        'status'
    ];
}
