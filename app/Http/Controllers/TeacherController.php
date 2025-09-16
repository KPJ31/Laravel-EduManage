<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::with('teacherDetail')->get();
        $courses = Course::all();
        return view('teachers.index', compact('teachers', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('teachers.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|string',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'courses' => 'required|array',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'tprofile' => 'required|image|max:2048',
        ]);

        $profilePath = null;
        if($request->hasFile('tprofile')) {
            $profilePath = $request->file('tprofile')->store('TeachersProfile', 'public');
        }

        $teacher = Teacher::create([
            'fullname' => $validated['fullname'],
            'dob' => $validated['dob'],
            'gender' => $validated['gender'],
        ]);

        $teacher->teacherDetail()->create([
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'tprofile' => $profilePath,
        ]);

        $teacher->courses()->sync($validated['courses']);

        return redirect()->route('teachers.index')->with('Success', 'Teacher Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        return view('teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        $courses = Course::all();
        return view('teachers.edit', compact('teacher', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'fullname' => 'required|string',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'courses' => 'required|array',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'tprofile' => 'required|image|max:2048',
        ]);

        $profilePath = $teacher->teacherDetail->tprofile; // keep old image by default

        if ($request->hasFile('tprofile')) {
            if ($teacher->teacherDetail->tprofile && \Storage::disk('public')->exists($teacher->teacherDetail->tprofile)) {
                \Storage::disk('public')->delete($teacher->teacherDetail->tprofile);
            }
            $profilePath = $request->file('tprofile')->store('teachers', 'public');
        }

        $teacher->update([
            'fullname' => $validated['fullname'],
            'dob' => $validated['dob'],
            'gender' => $validated['gender'],
        ]);

        $teacher->teacherDetail()->update([
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'tprofile' => $profilePath,
        ]);

        $teacher->courses()->sync($validated['courses']);

        return redirect()->route('teachers.index')->with('Success', 'Teacher Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
