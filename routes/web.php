<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::resource('courses', CourseController::class);
Route::resource('students', StudentController::class);
Route::resource('teachers', TeacherController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
