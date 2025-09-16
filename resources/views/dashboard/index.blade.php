@extends('layouts.app')

@section('main-content')
<div class="container">
    <h1 class="mb-4 fw-bold text-center text-primary">📊 Admin Dashboard</h1>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-4 p-4 text-white position-relative overflow-hidden"
                 style="background: linear-gradient(135deg, #28a745, #6cc070);">
                <div class="d-flex align-items-center">
                    <div class="display-4 me-3">🎓</div>
                    <div>
                        <h3 class="fw-bold mb-0">{{ $studentsCount }}</h3>
                        <p class="fw-semibold mb-0 fs-5">Students</p>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <a href="{{ route('students.index') }}" class="btn btn-light fw-semibold">Manage</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-4 p-4 text-white position-relative overflow-hidden"
                 style="background: linear-gradient(135deg, #17a2b8, #5bc0de);">
                <div class="d-flex align-items-center">
                    <div class="display-4 me-3">👩‍🏫</div>
                    <div>
                        <h3 class="fw-bold mb-0">{{ $teachersCount }}</h3>
                        <p class="fw-semibold mb-0 fs-5">Teachers</p>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <a href="{{ route('teachers.index') }}" class="btn btn-light fw-semibold">Manage</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-4 p-4 text-white position-relative overflow-hidden"
                 style="background: linear-gradient(135deg, #ffc107, #ffda6a);">
                <div class="d-flex align-items-center">
                    <div class="display-4 me-3">📘</div>
                    <div>
                        <h3 class="fw-bold mb-0">{{ $coursesCount }}</h3>
                        <p class="fw-semibold mb-0 fs-5">Courses</p>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <a href="{{ route('courses.index') }}" class="btn btn-light fw-semibold">Manage</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
