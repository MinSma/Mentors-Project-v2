<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'mentor_student';

    protected $fillable = [
        'mentor_id',
        'student_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mentor() {
        return $this->belongsTo(Mentor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student() {
        return $this->belongsTo(Student::class);
    }
}
