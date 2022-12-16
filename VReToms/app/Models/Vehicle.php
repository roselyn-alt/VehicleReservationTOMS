<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand',
        'model',
        'color',
        'driver_id',
        'plate_number',
        'number_of_seats',
        'energy_source',
        'status',
    ];
}
