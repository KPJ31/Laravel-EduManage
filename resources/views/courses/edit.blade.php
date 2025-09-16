@extends('layouts.app')

@section('main-content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card p-4 shadow-lg border-0 rounded-4">
                <h1 class="mb-4 text-center fw-bold text-warning">✏️ Edit Course</h1>
                <form action="{{ route('courses.update', $course->id) }}" method="post" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')

                    <div class="row g-4">
                        <div class="col-md-6 pt-3">
                            <div class="mb-3">
                                <label for="title" class="form-label fw-semibold">Course Title</label>
                                <input type="text" id="title" name="title" value="{{ $course->title }}" class="form-control border-primary shadow-sm" placeholder="Enter Course Title" required>
                                @error('title')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="code" class="form-label fw-semibold">Course Code</label>
                                <input type="number" id="code" name="code" value="{{ $course->code }}" class="form-control border-primary shadow-sm" placeholder="Enter Course Code" required>
                                @error('code')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="gpa" class="form-label fw-semibold">Course GPA</label>
                                <input type="number" id="gpa" name="gpa" value="{{ $course->gpa }}" class="form-control border-primary shadow-sm" step="0.1" min="0" max="4" placeholder="Enter Course GPA (0.0 - 4.0)" required>
                                @error('gpa')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3 text-center">
                                <img src="{{ asset('build/assets/images/edit.gif') }}" alt="Preview" id="preview" class="mx-auto d-block shadow border border-2 rounded p-2" width="160" height="160">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label fw-semibold">Description</label>
                                <textarea name="description" id="description" cols="30" rows="4" class="form-control border-primary shadow-sm" placeholder="Enter Course Description" required>{{ $course->description }}</textarea>
                                @error('description')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 text-center">
                        <button type="submit" class="btn btn-success px-4 me-2 shadow">🔄 Update</button>
                        <a href="{{ route('courses.index') }}" class="btn btn-primary px-4 shadow">⬅ Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
