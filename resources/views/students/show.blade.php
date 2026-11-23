@extends('layouts.app')

@section('main-content')
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="page-header justify-content-center text-center">
                <h1 class="page-title">
                    <span class="page-icon"><i class="fa-solid fa-id-card"></i></span>
                    Student Details
                </h1>
            </div>

            <div class="card content-card p-4">
                <div class="text-center mb-4">
                    <img src="{{ $student->sprofile ? asset('storage/' . $student->sprofile) : asset('build/assets/images/profile.gif') }}" alt="Preview" id="preview" class="rounded-circle img-thumbnail shadow border border-3 border-primary p-1">
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered align-middle shadow-sm detail-table">
                        <tbody>
                            <tr><th>First Name</th><td>{{ $student->fname }}</td></tr>
                            <tr><th>Last Name</th><td>{{ $student->lname }}</td></tr>
                            <tr><th>Date of Birth</th><td>{{ $student->dob }}</td></tr>
                            <tr><th>Gender</th><td class="text-capitalize">{{ $student->gender }}</td></tr>
                            <tr><th>Email</th><td>{{ $student->studentDetail->email }}</td></tr>
                            <tr><th>Phone Number</th><td>{{ $student->studentDetail->phone }}</td></tr>
                            <tr><th>Address</th><td>{{ $student->studentDetail->address }}</td></tr>
                            <tr><th>Course</th><td><span class="badge text-bg-primary">{{ $student->course->title }}</span></td></tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-center mt-4 d-flex flex-wrap justify-content-center gap-2">
                    <a class="btn btn-primary px-4 shadow-sm" href="{{ route('students.index') }}"><i class="fa-solid fa-arrow-left"></i> Back</a>
                    <a class="btn btn-warning px-4 shadow-sm" href="{{ route('students.edit', $student->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
