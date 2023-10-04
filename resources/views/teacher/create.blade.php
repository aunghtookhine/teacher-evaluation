@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4>Create New Teacher</h4>
                <hr>

                <form action=" {{ route('teacher.store') }} " method="post">
                    @csrf
                    <input type="hidden" name="role" value="teacher">
                    <div class="d-flex">
                        <div class="mb-3 col-5 me-3">
                            <label class="form-label">Name</label>
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
                    <div class="mb-3 col-5 me-3">
                        <label class="form-label">Position</label>
                        <select class="form-select" aria-label="Default select example" name="position">
                            <option value="dean">Dean</option>
                            <option value="lecturer">Lecturer</option>
                        </select>
                    </div>
                    <button class="btn btn-dark">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
