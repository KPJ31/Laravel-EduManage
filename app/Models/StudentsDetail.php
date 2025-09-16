<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentsDetail extends Model
{
    protected $fillable = [
        'email',
        'phone',
        'address',
        'student_id',
    ];

    public function student(): BelongsTo {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
