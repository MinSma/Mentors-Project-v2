<?php
declare(strict_types = 1);

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Mentor
 * @package App\Models
 */
class Mentor extends Authenticatable
{
    use Notifiable;

    /**
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'gender',
        'city',
        'address',
        'birthday',
        'about',
        'phone',
        'blockings_id',
        'bank_accounts_id',
        'rating'
        ];

    /**
     * @var array
     *
     */
    protected $hidden = [
        'remember_token'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function blocking() {
        return $this->hasOne(Blocking::class);
    }
}