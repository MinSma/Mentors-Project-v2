<?php
declare(strict_types = 1);

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Blocking
 * @package App\Models
 */
class Blocking extends Authenticatable
{
    use Notifiable;

    /**
     * @var array
     */
    protected $fillable = [
        'start_date',
        'end_date',
        'reason'
    ];

    /**
     * @var array
     *
     */
    protected $hidden = [
    ];
}