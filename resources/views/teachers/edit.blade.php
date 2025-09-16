@extends('layouts.app')

@section('main-content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card p-4 shadow-lg border-0 rounded-4">
                <h1 class="mb-4 text-center fw-bold text-primary">👨‍🏫 Edit Teacher</h1>
                <form action="{{ route('teachers.update', $teacher->id) }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="fullname" class="form-label fw-semibold">Full Name</label>
                                <input type="text" id="fullname" name="fullname" value="{{ $teacher->fullname }}" class="form-control border-primary shadow-sm" placeholder="Enter Full Name" required>
                                @error('fullname')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="dob" class="form-label fw-semibold">Date of Birth</label>
                                <input type="date" id="dob" name="dob" value="{{ $teacher->dob }}" class="form-control border-primary shadow-sm" required>
                                @error('dob')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold d-block">Gender</label>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" value="male" name="gender" id="male" {{ $teacher->gender == 'male' ? 'checked' : '' }}>
                                    <label for="male" class="form-check-label">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" value="female" name="gender" id="female" {{ $teacher->gender == 'female' ? 'checked' : '' }}>
                                    <label for="female" class="form-check-label">Female</label>
                                </div>
                                @error('gender')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email', $teacher->teacherDetail->email) }}" class="form-control border-primary shadow-sm" placeholder="example@gmail.com" required>
                                @error('email')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="course" class="form-label fw-semibold">Courses</label>
                                <div class="border rounded p-2 bg-light">
                                    @foreach($courses as $course)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $course->id }}" name="courses[]" id="course_{{ $course->id }}"
                                            {{ in_array($course->id, old('courses', $teacher->courses->pluck('id')->toArray() ?? [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="course_{{ $course->id }}">
                                                {{ $course->title }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="text-center mb-3">
                                <img src="{{ $teacher->teacherDetail->tprofile ? asset('storage/' . $teacher->teacherDetail->tprofile) : asset('build/assets/images/profile.gif') }}" alt="Preview" id="preview" class="rounded-circle img-thumbnail shadow border border-3 border-primary p-1" width="150">
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label fw-semibold">Address</label>
                                <textarea name="address" id="address" cols="30" rows="2" class="form-control border-primary shadow-sm" placeholder="Enter Address" required>{{ $teacher->teacherDetail->address }}</textarea>
                                @error('address')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label fw-semibold">Phone Number</label>
                                <input type="tel" id="phone" name="phone" value="{{ $teacher->teacherDetail->phone }}" class="form-control border-primary shadow-sm" placeholder="+1 (192) 901-9823" pattern="^\+\d{1,3}\s\(\d{3}\)\s\d{3}-\d{4}$" required>
                                @error('phone')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tprofile" class="form-label fw-semibold">Profile Image</label>
                                <input type="file" id="tprofile" name="tprofile" class="form-control border-primary shadow-sm" accept="image/*" onchange="previewImage(event)">
                                @error('tprofile')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 text-center d-flex justify-content-center gap-2 flex-wrap">
                        <button type="submit" class="btn btn-success px-4 shadow">💾Update</button>
                        <a href="{{ route('teachers.index') }}" class="btn btn-primary px-4 shadow">⬅Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
