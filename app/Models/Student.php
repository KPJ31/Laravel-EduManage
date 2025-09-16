<?php

namespace App\Models;

use App\Models\Course;
use App\Models\StudentsDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    protected $fillable = [
        'fname',
        'lname',
        'dob',
        'gender',
        'sprofile',
        'course_id',
    ];

    public function studentDetail(): HasOne {
        return $this->hasOne(StudentsDetail::class, 'student_id');
    }

    public function course(): BelongsTo {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
