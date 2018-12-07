<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'state',
        'creation_date',
        'mentor_confirmation',
        'student_confirmation',
        'payment_date',
        'reservation_id'
    ];
}
