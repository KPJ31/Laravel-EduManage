@extends('layouts.app')

@section('main-content')
    <div class="page-header">
        <h2 class="page-title">
            <span class="page-icon"><i class="fa-solid fa-user-graduate"></i></span>
            Students
        </h2>
        <div class="page-actions">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary shadow-sm"><i class="fa-solid fa-gauge-high"></i> Dashboard</a>
            <a href="{{ route('students.create') }}" class="btn btn-success shadow-sm"><i class="fa-solid fa-user-plus"></i> Add Student</a>
        </div>
    </div>

    <div class="card content-card p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h3 class="mb-0 fw-bold text-dark"><i class="fa-solid fa-table-list text-primary me-2"></i>Students Table</h3>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle shadow-sm">
                <thead class="text-center">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Course</th>
                        <th scope="col" style="width: 190px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                        <tr>
                            <td class="text-center fw-semibold">{{ $student->id }}</td>
                            <td>{{ $student->fname }}</td>
                            <td>{{ $student->lname }}</td>
                            <td>{{ $student->studentDetail->email }}</td>
                            <td>{{ $student->studentDetail->phone }}</td>
                            <td>{{ $student->studentDetail->address }}</td>
                            <td><span class="badge text-bg-primary">{{ $student->course->title }}</span></td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                    <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm shadow-sm"><i class="fa-solid fa-eye"></i> View</a>
                                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm shadow-sm"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm shadow-sm" onclick="return confirm('Are you sure you want to delete this student?')"><i class="fa-solid fa-trash"></i> Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted fw-semibold py-4">
                                <i class="fa-solid fa-circle-info me-1"></i> No students found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
