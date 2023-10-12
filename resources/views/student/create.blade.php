@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4 class="text-white">Create New Student</h4>
                <hr class="text-white">

                <form action=" {{ route('student.store') }} " method="post">
                    @csrf
                    <input type="hidden" name="role" value="student">
                    <div class="d-flex">
                        <div class="mb-3 col-5 me-3">
                            <label class="form-label text-white">Name</label>
                            <input type="text" class=" form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-5 me-3">
                            <label class="form-label">Email</label>
                            <input type="text" class=" form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="mb-3 col-5 me-3">
                            <label class="form-label">Password</label>
                            <input type="password"" class=" form-control @error('password') is-invalid @enderror"
                                name="password">
                            @error('password')
                                <div class="text-danger invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-5 me-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password"
                                class=" form-control @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation">
                            @error('password_confirmation')
                                <div class="text-danger invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="mb-3 col-5 me-3">
                            <label class="form-label">Roll No</label>
                            <input type="text" class="form-control @error('roll_number') is-invalid @enderror"
                                name="roll_number" placeholder="Example 1IT-1" value="{{ old('roll_number') }}">
                            @error('roll_number')
                                <div class="text-danger invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-5 me-3">
                            <label class="form-label">Class</label>
                            <select class="form-select" aria-label="Default select example" name="grade_id">
                                @foreach (App\Models\Grade::where('isArchived', false)->get() as $grade)
                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-color">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
