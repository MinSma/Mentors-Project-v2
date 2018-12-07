<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'sum',
        'data',
        'comment',
        'bank_account_id'
    ];
}
