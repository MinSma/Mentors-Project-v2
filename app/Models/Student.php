<?php
declare(strict_types = 1);

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Student
 * @package App\Models
 */
class Student extends Authenticatable
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
        'education',
        'phone',
        'blockings_id',
        'bank_accounts_id'
    ];

    /**
     * @var array
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
