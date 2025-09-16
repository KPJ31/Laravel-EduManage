@extends('layouts.app')

@section('main-content')
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="fw-bold text-primary">📚 Courses List</h2>
                <div>
                   <a href="{{ route('dashboard') }}" class="btn btn-secondary shadow-sm">⬅ Dashboard</a> 
                   <a href="{{ route('courses.create') }}" class="btn btn-success shadow-sm">➕ Create Course</a>
                </div>                
            </div>

            <div class="card p-4 shadow-lg border-0 rounded-4">
                <h4 class="mb-4 text-center fw-bold text-dark">Courses Table</h4>            

                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle table-bordered">
                        <thead class="table-dark text-center">
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
                                    <td>{{ $course->code }}</td>
                                    <td>{{ $course->gpa }}</td>
                                    <td>{{ $course->description }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info btn-sm shadow-sm me-1">👁Show</a>
                                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm shadow-sm me-1">✏️Edit</a>
                                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm shadow-sm"onclick="return confirm('Are you sure you want to delete this course?')">🗑Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted fw-semibold">⚠️ No courses found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
