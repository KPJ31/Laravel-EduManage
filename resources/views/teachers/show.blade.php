@extends('layouts.app')

@section('main-content')
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="page-header justify-content-center text-center">
                <h1 class="page-title">
                    <span class="page-icon"><i class="fa-solid fa-id-card"></i></span>
                    Teacher Details
                </h1>
            </div>

            <div class="card content-card p-4">
                <div class="text-center mb-4">
                    <img src="{{ $teacher->teacherDetail->tprofile ? asset('storage/' . $teacher->teacherDetail->tprofile) : asset('build/assets/images/profile.gif') }}" alt="Preview" id="preview" class="rounded-circle img-thumbnail shadow border border-3 border-primary p-1">
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered align-middle shadow-sm detail-table">
                        <tbody>
                            <tr><th>Full Name</th><td>{{ $teacher->fullname }}</td></tr>
                            <tr><th>Date of Birth</th><td>{{ $teacher->dob }}</td></tr>
                            <tr><th>Gender</th><td class="text-capitalize">{{ $teacher->gender }}</td></tr>
                            <tr><th>Email</th><td>{{ $teacher->teacherDetail->email }}</td></tr>
                            <tr><th>Phone Number</th><td>{{ $teacher->teacherDetail->phone }}</td></tr>
                            <tr><th>Address</th><td>{{ $teacher->teacherDetail->address }}</td></tr>
                            <tr>
                                <th>Courses</th>
                                <td>
                                    @if($teacher->courses->count())
                                        <div class="d-flex flex-wrap gap-1">
                                            @foreach($teacher->courses as $course)
                                                <span class="badge text-bg-primary">{{ $course->title }}</span>
                                            @endforeach
                                        </div>
                                    @else
                                        <span class="text-muted">No courses assigned</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-center mt-4 d-flex flex-wrap justify-content-center gap-2">
                    <a class="btn btn-primary px-4 shadow-sm" href="{{ route('teachers.index') }}"><i class="fa-solid fa-arrow-left"></i> Back</a>
                    <a class="btn btn-warning px-4 shadow-sm" href="{{ route('teachers.edit', $teacher->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
