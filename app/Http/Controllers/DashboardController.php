<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;

class DashboardController extends Controller
{
    public function index()
    {
        $studentsCount = Student::count();
        $teachersCount = Teacher::count();
        $coursesCount  = Course::count();

        return view('dashboard.index', compact('studentsCount', 'teachersCount', 'coursesCount'));
    }
}
