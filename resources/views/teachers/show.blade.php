@extends('layouts.app')

@section('main-content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card p-4 shadow-lg border-0 rounded-4">
                <h1 class="mb-4 text-center fw-bold text-info">👨‍🏫 Teacher Details</h1>            

                <div class="text-center mb-4">
                    <img src="{{ $teacher->teacherDetail->tprofile ? asset('storage/' . $teacher->teacherDetail->tprofile) : asset('build/assets/images/profile.gif') }}" alt="Preview" id="preview" class="rounded-circle img-thumbnail shadow border border-3 border-primary p-1">
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered align-middle shadow-sm">
                        <tbody>
                            <tr>
                                <th class="bg-light text-primary w-25">Full Name</th>
                                <td class="text-muted">{{ $teacher->fullname }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light text-primary">Date of Birth</th>
                                <td class="text-muted">{{ $teacher->dob }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light text-primary">Gender</th>
                                <td class="text-muted text-capitalize">{{ $teacher->gender }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light text-primary">Email</th>
                                <td class="text-muted">{{ $teacher->teacherDetail->email }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light text-primary">Phone Number</th>
                                <td class="text-muted">{{ $teacher->teacherDetail->phone }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light text-primary">Address</th>
                                <td class="text-muted">{{ $teacher->teacherDetail->address }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light text-primary">Courses</th>
                                <td>
                                    @if($teacher->courses->count())
                                        <ul class="list-group list-group-flush">
                                            @foreach($teacher->courses as $course)
                                                <li class="list-group-item">{{ $course->title }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <span class="text-muted">No courses assigned</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-center mt-4 d-flex flex-wrap justify-content-center gap-2">
                    <a class="btn btn-primary px-4 shadow-sm" href="{{ route('teachers.index') }}">⬅ Back</a>
                    <a class="btn btn-warning px-4 shadow-sm" href="{{ route('teachers.edit', $teacher->id) }}">✏️ Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
