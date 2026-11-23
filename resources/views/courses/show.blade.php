@extends('layouts.app')

@section('main-content')
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="page-header justify-content-center text-center">
                <h1 class="page-title">
                    <span class="page-icon"><i class="fa-solid fa-book"></i></span>
                    Course Details
                </h1>
            </div>

            <div class="card content-card p-4">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle shadow-sm detail-table">
                        <tbody>
                            <tr><th>Course Title</th><td>{{ $course->title }}</td></tr>
                            <tr><th>Course Code</th><td><span class="badge text-bg-secondary">{{ $course->code }}</span></td></tr>
                            <tr><th>Course GPA</th><td><span class="badge text-bg-success">{{ $course->gpa }}</span></td></tr>
                            <tr><th>Description</th><td>{{ $course->description }}</td></tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-center mt-4 d-flex flex-wrap justify-content-center gap-2">
                    <a class="btn btn-primary px-4 shadow-sm" href="{{ route('courses.index') }}"><i class="fa-solid fa-arrow-left"></i> Back</a>
                    <a class="btn btn-warning px-4 shadow-sm" href="{{ route('courses.edit', $course->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
