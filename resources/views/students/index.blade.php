@extends('layouts.app')

@section('main-content')
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="fw-bold text-primary">👩‍🎓 Students</h2>
                <div>
                   <a href="{{ route('dashboard') }}" class="btn btn-secondary shadow-sm">⬅ Dashboard</a> 
                   <a href="{{ route('students.create') }}" class="btn btn-success shadow-sm">➕ Add Student</a>
                </div>
            </div>

            <div class="card p-4 shadow-lg border-0 rounded-4">
                <h3 class="mb-4 text-center fw-bold text-dark">📋 Students Table</h3>

                <table class="table table-hover table-bordered align-middle shadow-sm">
                    <thead class="table-dark text-center">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Course</th>
                            <th scope="col" style="width: 180px;">Action</th>
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
                                <td>{{ $student->course->title }}</td>
                                <td class="text-center">
                                    <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm shadow-sm me-1">👁View</a>
                                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm shadow-sm me-1">✏️Edit</a>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm shadow-sm"onclick="return confirm('Are you sure you want to delete this student?')">🗑Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted fw-semibold py-3">
                                    ⚠️ No students found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection