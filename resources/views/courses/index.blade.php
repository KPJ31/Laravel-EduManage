@extends('layouts.app')

@section('main-content')
    <div class="page-header">
        <h2 class="page-title">
            <span class="page-icon"><i class="fa-solid fa-book-open"></i></span>
            Courses
        </h2>
        <div class="page-actions">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary shadow-sm"><i class="fa-solid fa-gauge-high"></i> Dashboard</a>
            <a href="{{ route('courses.create') }}" class="btn btn-success shadow-sm"><i class="fa-solid fa-square-plus"></i> Create Course</a>
        </div>
    </div>

    <div class="card content-card p-4">
        <h3 class="mb-4 fw-bold text-dark"><i class="fa-solid fa-table-list text-primary me-2"></i>Courses Table</h3>

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle table-bordered">
                <thead class="text-center">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Code</th>
                        <th scope="col">GPA</th>
                        <th scope="col">Description</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $course)
                        <tr>
                            <td class="text-center fw-semibold">{{ $course->id }}</td>
                            <td>{{ $course->title }}</td>
                            <td><span class="badge text-bg-secondary">{{ $course->code }}</span></td>
                            <td><span class="badge text-bg-success">{{ $course->gpa }}</span></td>
                            <td>{{ $course->description }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info btn-sm shadow-sm"><i class="fa-solid fa-eye"></i> Show</a>
                                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm shadow-sm"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm shadow-sm" onclick="return confirm('Are you sure you want to delete this course?')"><i class="fa-solid fa-trash"></i> Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted fw-semibold py-4">
                                <i class="fa-solid fa-circle-info me-1"></i> No courses found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
