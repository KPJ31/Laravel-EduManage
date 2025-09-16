@extends('layouts.app')

@section('main-content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card p-4 shadow-lg border-0 rounded-4">
            <h1 class="mb-4 text-center fw-bold text-info">👨‍🎓 Student Details</h1>            

            <div class="text-center mb-4">
                <img src="{{ $student->sprofile ? asset('storage/' . $student->sprofile) : asset('build/assets/images/profile.gif') }}" alt="Preview" id="preview" class="rounded-circle img-thumbnail shadow border border-3 border-primary p-1">
            </div>

            <div class="table-responsive">
                <table class="table table-bordered align-middle shadow-sm">
                    <tbody>
                        <tr>
                            <th class="bg-light text-primary w-25">First Name</th>
                            <td class="text-muted">{{ $student->fname }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light text-primary">Last Name</th>
                            <td class="text-muted">{{ $student->lname }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light text-primary">Date of Birth</th>
                            <td class="text-muted">{{ $student->dob }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light text-primary">Gender</th>
                            <td class="text-muted text-capitalize">{{ $student->gender }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light text-primary">Email</th>
                            <td class="text-muted">{{ $student->studentDetail->email }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light text-primary">Phone Number</th>
                            <td class="text-muted">{{ $student->studentDetail->phone }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light text-primary">Address</th>
                            <td class="text-muted">{{ $student->studentDetail->address }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light text-primary">Course</th>
                            <td class="text-muted">{{ $student->course->title }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="text-center mt-4 d-flex flex-wrap justify-content-center gap-2">
                <a class="btn btn-primary px-4 shadow-sm" href="{{ route('students.index') }}">⬅ Back</a>
                <a class="btn btn-warning px-4 shadow-sm" href="{{ route('students.edit', $student->id) }}">✏️ Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection
