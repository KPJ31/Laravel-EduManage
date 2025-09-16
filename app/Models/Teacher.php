<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Teacher extends Model
{
    protected $fillable = [
        'fullname',
        'dob',
        'gender',
        'course_id',
    ];

    public function teacherDetail(): HasOne {
        return $this->hasOne(TeachersDetail::class, 'teacher_id');
    }

    public function courses(): BelongsToMany {
        return $this->belongsToMany(Course::class, 'course_teacher', 'teacher_id', 'course_id');
    }
}
