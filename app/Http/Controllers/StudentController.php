<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('studentDetail')->get();
        $courses = Course::all();
        return view('students.index', compact('students', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('students.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'sprofile' => 'required|image|max:2048',
            'course_id'  => 'required|exists:courses,id',
        ]);

        $profilePath = null;
        if($request->hasFile('sprofile')) {
            $profilePath = $request->file('sprofile')->store('StudentsProfile', 'public');
        }

        $student = Student::create([
            'fname' => $validated['fname'],
            'lname' => $validated['lname'],
            'dob' => $validated['dob'],
            'gender' => $validated['gender'],
            'course_id'=> $validated['course_id'],
            'sprofile' => $profilePath,
        ]);

        $student->studentDetail()->create([
            'email' => $validated['email'],
            'address' => $validated['address'],
            'phone' => $validated['phone'],
        ]);

        return redirect()->route('students.index')->with('Success', 'Student Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $courses = Course::all();
        return view('students.edit', compact('student', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'sprofile' => 'required|image|max:2048',
            'course_id'  => 'required|exists:courses,id',
        ]);

        $profilePath = null;
        if($request->hasFile('sprofile')) {
            if ($student->sprofile && \Storage::disk('public')->exists($student->sprofile)) {
                \Storage::disk('public')->delete($student->sprofile);
            }
        }

        $student->update([
            'fname' => $validated['fname'],
            'lname' => $validated['lname'],
            'dob' => $validated['dob'],
            'gender' => $validated['gender'],
            'course_id'=> $validated['course_id'],
            'sprofile' => $profilePath,
        ]);

        $student->studentDetail()->update([
            'email' => $validated['email'],
            'address' => $validated['address'],
            'phone' => $validated['phone'],
        ]);

        return redirect()->route('students.index')->with('Success', 'Student Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('Success', 'Student Deleted Successfully');
    }
}
