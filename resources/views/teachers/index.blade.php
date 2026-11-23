@extends('layouts.app')

@section('main-content')
    <div class="page-header">
        <h2 class="page-title">
            <span class="page-icon"><i class="fa-solid fa-chalkboard-user"></i></span>
            Teachers
        </h2>
        <div class="page-actions">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary shadow-sm"><i class="fa-solid fa-gauge-high"></i> Dashboard</a>
            <a href="{{ route('teachers.create') }}" class="btn btn-success shadow-sm"><i class="fa-solid fa-user-plus"></i> Add Teacher</a>
        </div>
    </div>

    <div class="card content-card p-4">
        <h3 class="mb-4 fw-bold text-dark"><i class="fa-solid fa-table-list text-primary me-2"></i>Teachers Table</h3>

        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle shadow-sm">
                <thead class="text-center">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Courses</th>
                        <th scope="col" style="width: 210px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teachers as $teacher)
                        <tr>
                            <td class="text-center fw-semibold">{{ $teacher->id }}</td>
                            <td>{{ $teacher->fullname }}</td>
                            <td>{{ $teacher->teacherDetail->email }}</td>
                            <td>{{ $teacher->teacherDetail->phone }}</td>
                            <td>{{ $teacher->teacherDetail->address }}</td>
                            <td>
                                @if($teacher->courses->isNotEmpty())
                                    <div class="d-flex flex-wrap gap-1">
                                        @foreach($teacher->courses as $course)
                                            <span class="badge text-bg-primary">{{ $course->title }}</span>
                                        @endforeach
                                    </div>
                                @else
                                    <span class="text-muted">No Courses Assigned</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                    <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-info btn-sm shadow-sm"><i class="fa-solid fa-eye"></i> View</a>
                                    <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning btn-sm shadow-sm"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm shadow-sm" onclick="return confirm('Are you sure you want to delete this teacher?')"><i class="fa-solid fa-trash"></i> Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted fw-semibold py-4">
                                <i class="fa-solid fa-circle-info me-1"></i> No teachers found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
