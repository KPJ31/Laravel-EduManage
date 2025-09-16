<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    protected $fillable = [
        'title',
        'code',
        'gpa',
        'description',
    ];

    public function students(): HasMany {
        return $this->hasMany(Student::class, 'course_id');
    }

    public function teachers(): BelongsToMany {
        return $this->belongsToMany(Teacher::class, 'course_teacher', 'teacher_id', 'course_id');
    }
}
