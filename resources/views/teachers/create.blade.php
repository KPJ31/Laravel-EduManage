@extends('layouts.app')

@section('main-content')
    <div class="row">
        <div class="col-lg-9 mx-auto">
            <div class="page-header justify-content-center text-center">
                <h1 class="page-title">
                    <span class="page-icon"><i class="fa-solid fa-user-plus"></i></span>
                    Teacher Register Form
                </h1>
            </div>

            <div class="card content-card p-4">
                <form action="{{ route('teachers.store') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="fullname" class="form-label fw-semibold">Full Name</label>
                                <input type="text" id="fullname" name="fullname" value="{{ old('fullname') }}" class="form-control shadow-sm" placeholder="Enter Full Name" required>
                                @error('fullname') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="dob" class="form-label fw-semibold">Date of Birth</label>
                                <input type="date" id="dob" name="dob" value="{{ old('dob') }}" class="form-control shadow-sm" required>
                                @error('dob') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold d-block">Gender</label>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" value="male" name="gender" id="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
                                    <label for="male" class="form-check-label">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" value="female" name="gender" id="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                                    <label for="female" class="form-check-label">Female</label>
                                </div>
                                @error('gender') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control shadow-sm" placeholder="example@gmail.com" required>
                                @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Courses</label>
                                <div class="check-panel p-3">
                                    @foreach($courses as $course)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $course->id }}" name="courses[]" id="course_{{ $course->id }}">
                                            <label class="form-check-label" for="course_{{ $course->id }}">{{ $course->title }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="text-center mb-4">
                                <img src="{{ asset('build/assets/images/profile.gif') }}" alt="Preview" id="preview" class="rounded-circle img-thumbnail shadow border border-3 border-primary p-1">
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label fw-semibold">Address</label>
                                <textarea name="address" id="address" cols="30" rows="2" class="form-control shadow-sm" placeholder="Enter Address" required>{{ old('address') }}</textarea>
                                @error('address') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label fw-semibold">Phone Number</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="form-control shadow-sm" placeholder="+1 (192) 901-9823" pattern="^\+\d{1,3}\s\(\d{3}\)\s\d{3}-\d{4}$" required>
                                @error('phone') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tprofile" class="form-label fw-semibold">Profile Image</label>
                                <input type="file" id="tprofile" name="tprofile" class="form-control shadow-sm" accept="image/*" required>
                                @error('tprofile') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 text-center d-flex justify-content-center gap-2 flex-wrap">
                        <button type="submit" class="btn btn-success px-4 shadow"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                        <button type="reset" class="btn btn-secondary px-4 shadow"><i class="fa-solid fa-rotate-left"></i> Clear</button>
                        <a href="{{ route('teachers.index') }}" class="btn btn-primary px-4 shadow"><i class="fa-solid fa-arrow-left"></i> Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
