@extends('layouts.app')

@section('main-content')
    <div>
        <div class="page-header justify-content-center text-center">
            <h1 class="page-title">
                <span class="page-icon"><i class="fa-solid fa-chart-pie"></i></span>
                Admin Dashboard
            </h1>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card dashboard-card students p-4 text-white" style="background: linear-gradient(135deg, #198754, #20c997);">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon me-3"><i class="fa-solid fa-user-graduate"></i></div>
                        <div>
                            <h3 class="fw-bold mb-0">{{ $studentsCount }}</h3>
                            <p class="fw-semibold mb-0 fs-5">Students</p>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ route('students.index') }}" class="btn btn-light fw-semibold"><i class="fa-solid fa-arrow-right"></i> Manage</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card dashboard-card teachers p-4 text-white" style="background: linear-gradient(135deg, #0dcaf0, #0d6efd);">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon me-3"><i class="fa-solid fa-chalkboard-user"></i></div>
                        <div>
                            <h3 class="fw-bold mb-0">{{ $teachersCount }}</h3>
                            <p class="fw-semibold mb-0 fs-5">Teachers</p>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ route('teachers.index') }}" class="btn btn-light fw-semibold"><i class="fa-solid fa-arrow-right"></i> Manage</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card dashboard-card courses p-4 text-white" style="background: linear-gradient(135deg, #fd7e14, #ffc107);">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon me-3"><i class="fa-solid fa-book-open"></i></div>
                        <div>
                            <h3 class="fw-bold mb-0">{{ $coursesCount }}</h3>
                            <p class="fw-semibold mb-0 fs-5">Courses</p>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ route('courses.index') }}" class="btn btn-light fw-semibold"><i class="fa-solid fa-arrow-right"></i> Manage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
