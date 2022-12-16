<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelRequest extends Model
{
    use HasFactory;

    protected $fillable = [
       'employee_id',
       'date',
       'requesting_office',
       'type_of_vehicle',
       'date_of_travel',
       'departure_time',
       'arrival_date',
       'arrival_time',
       'starting_location',
       'destination',
       'estimated_liters',
       'name_of_passengers',
       'purpose'
    ];

    protected $casts = [
        'name_of_passengers' => 'array'
    ];
}
