@extends('layouts.app')

@section('main-content')
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="fw-bold text-primary">👨‍🏫 Teachers</h2>
                <div>
                   <a href="{{ route('dashboard') }}" class="btn btn-secondary shadow-sm">⬅ Dashboard</a> 
                   <a href="{{ route('teachers.create') }}" class="btn btn-success shadow-sm">➕ Add Teacher</a>
                </div>
            </div>

            <div class="card p-4 shadow-lg border-0 rounded-4">
                <h3 class="mb-4 text-center fw-bold text-dark">📋 Teachers Table</h3>

                <table class="table table-hover table-bordered align-middle shadow-sm">
                    <thead class="table-dark text-center">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Courses</th>
                            <th scope="col" style="width: 200px;">Action</th>
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
                                        <ul class="mb-0 ps-3">
                                            @foreach($teacher->courses as $course)
                                                <li>{{ $course->title }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <span class="text-muted">No Courses Assigned</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2 flex-wrap">
                                        <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-info btn-sm shadow-sm">👁View</a>
                                        <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning btn-sm shadow-sm">✏️Edit</a>
                                        <form action="{{ route('teachers.destroy', $teacher->id) }}" 
                                              method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm shadow-sm" onclick="return confirm('Are you sure you want to delete this teacher?')">🗑Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted fw-semibold py-3">
                                    ⚠️ No teachers found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
