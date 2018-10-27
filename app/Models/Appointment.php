<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'date',
        'time',
        'duration',
        'price',
        'type',
        'resources',
        'place',
        'additional_cost',
        'max_distances',
        'state',
        'language',
        'additional_info',
    ];
}
