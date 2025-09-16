@extends('layouts.app')

@section('main-content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card p-4 shadow-lg border-0 rounded-4">
            <h1 class="mb-4 text-center fw-bold text-info">📘 Course Details</h1>            

            <div class="table-responsive">
                <table class="table table-bordered align-middle shadow-sm">
                    <tbody>
                        <tr>
                            <th class="bg-light text-primary w-25">Course Title</th>
                            <td class="text-muted">{{ $course->title }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light text-primary">Course Code</th>
                            <td class="text-muted">{{ $course->code }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light text-primary">Course GPA</th>
                            <td class="text-muted">{{ $course->gpa }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light text-primary">Description</th>
                            <td class="text-muted">{{ $course->description }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="text-center mt-4 d-flex flex-wrap justify-content-center gap-2">
                <a class="btn btn-primary px-4 shadow-sm" href="{{ route('courses.index') }}">⬅ Back</a>
                <a class="btn btn-warning px-4 shadow-sm" href="{{ route('courses.edit', $course->id) }}">✏️ Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection
