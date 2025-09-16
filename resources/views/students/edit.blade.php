@extends('layouts.app')

@section('main-content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card p-4 shadow-lg border-0 rounded-4">
                <h1 class="mb-4 text-center fw-bold text-primary">✏️ Edit Student</h1>

                <form action="{{ route('students.update', $student->id) }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="fname" class="form-label fw-semibold">First Name</label>
                                <input type="text" id="fname" name="fname" value="{{ $student->fname }}" class="form-control border-primary shadow-sm" placeholder="Enter Your First Name" required>
                                @error('fname')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="lname" class="form-label fw-semibold">Last Name</label>
                                <input type="text" id="lname" name="lname" value="{{ $student->lname }}" class="form-control border-primary shadow-sm" placeholder="Enter Your Last Name" required>
                                @error('lname')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="dob" class="form-label fw-semibold">Date of Birth</label>
                                <input type="date" id="dob" name="dob" value="{{ $student->dob }}" class="form-control border-primary shadow-sm" required>
                                @error('dob')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold d-block">Gender</label>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" value="male" name="gender" id="male" {{ $student->gender == 'male' ? 'checked' : '' }}>
                                    <label for="male" class="form-check-label">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" value="female" name="gender" id="female" {{ $student->gender == 'female' ? 'checked' : '' }}>
                                    <label for="female" class="form-check-label">Female</label>
                                </div>
                                @error('gender')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Email</label>
                                <input type="email" id="email" name="email" value="{{ $student->studentDetail->email }}" class="form-control border-primary shadow-sm" placeholder="example@gmail.com" required>
                                @error('email')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="course_id" class="form-label fw-semibold">Course</label>
                                <select id="course_id" name="course_id" class="form-select border-primary shadow-sm" required>
                                    <option value="">Select Course</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}" {{ $student->course_id == $course->id ? 'selected' : '' }}>
                                            {{ $course->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('course_id') 
                                    <div class="text-danger small">{{ $message }}</div> 
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="text-center mb-3">
                                <img src="{{ $student->sprofile ? asset('storage/' . $student->sprofile) : asset('build/assets/images/profile.gif') }}" alt="Preview" id="preview" class="rounded-circle img-thumbnail shadow border border-3 border-primary p-1">
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label fw-semibold">Address</label>
                                <textarea name="address" id="address" cols="30" rows="2" class="form-control border-primary shadow-sm" placeholder="Enter Address" required>{{ $student->studentDetail->address }}</textarea>
                                @error('address')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label fw-semibold">Phone Number</label>
                                <input type="tel" id="phone" name="phone" value="{{ $student->studentDetail->phone }}" class="form-control border-primary shadow-sm" placeholder="+00 (123) 456-7890" pattern="^\+?[0-9]{1,3}\s?\([0-9]{3}\)\s?[0-9]{3}-[0-9]{4}$" required>
                                @error('phone')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="sprofile" class="form-label fw-semibold">Profile Image</label>
                                <input type="file" id="sprofile" name="sprofile" class="form-control border-primary shadow-sm" accept="image/*">
                                @error('sprofile')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 text-center">
                        <button type="submit" class="btn btn-success px-4 me-2 shadow">💾 Update</button>
                        <button type="reset" class="btn btn-secondary px-4 me-2 shadow">🧹 Clear</button>
                        <a href="{{ route('students.index') }}" class="btn btn-primary px-4 shadow">⬅ Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
