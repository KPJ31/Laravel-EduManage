@extends('layouts.app')

@section('main-content')
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="page-header justify-content-center text-center">
                <h1 class="page-title">
                    <span class="page-icon"><i class="fa-solid fa-square-plus"></i></span>
                    Add Course
                </h1>
            </div>

            <div class="card content-card p-4">
                <form action="{{ route('courses.store') }}" method="post" class="needs-validation" novalidate>
                    @csrf

                    <div class="row g-4">
                        <div class="col-md-6 pt-3">
                            <div class="mb-3">
                                <label for="title" class="form-label fw-semibold">Course Title</label>
                                <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control shadow-sm" placeholder="Enter Course Title" required>
                                @error('title') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="code" class="form-label fw-semibold">Course Code</label>
                                <input type="number" id="code" name="code" value="{{ old('code') }}" class="form-control shadow-sm" placeholder="Enter Course Code" required>
                                @error('code') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="gpa" class="form-label fw-semibold">Course GPA</label>
                                <input type="number" id="gpa" name="gpa" value="{{ old('gpa') }}" class="form-control shadow-sm" step="0.1" min="0" max="4" placeholder="Enter Course GPA (0.0 - 4.0)" required>
                                @error('gpa') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-4 text-center">
                                <img src="{{ asset('build/assets/images/courses.gif') }}" alt="Preview" id="preview" class="mx-auto d-block shadow border border-2 rounded p-2 bg-white">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label fw-semibold">Description</label>
                                <textarea name="description" id="description" cols="30" rows="4" class="form-control shadow-sm" placeholder="Enter Course Description" required>{{ old('description') }}</textarea>
                                @error('description') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 text-center d-flex justify-content-center gap-2 flex-wrap">
                        <button type="submit" class="btn btn-success px-4 shadow"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                        <button type="reset" class="btn btn-secondary px-4 shadow"><i class="fa-solid fa-rotate-left"></i> Clear</button>
                        <a href="{{ route('courses.index') }}" class="btn btn-primary px-4 shadow"><i class="fa-solid fa-arrow-left"></i> Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
