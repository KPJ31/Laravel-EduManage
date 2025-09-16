<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeachersDetail extends Model
{
    protected $fillable = [
        'email',
        'phone',
        'address',
        'tprofile',
        'teacher_id',
    ];

    public function teacher(): BelongsTo {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
