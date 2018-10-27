<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'level',
        'subject',
        'description',
        'qualification',
        'mentor_id'
    ];
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mentor() {
        return $this->belongsTo(Mentor::class);
    }
}
