@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4 class="text-white">Update Teacher Info</h4>
                <hr class="text-white">

                <form action=" {{ route('teacher.update', $teacher->id) }} " method="post">
                    @method('put')
                    @csrf
                    <div class="d-flex">
                        <div class="mb-3 col-5 me-3">
                            <label class="form-label">Name</label>
                            <input type="text" class=" form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name', $teacher->name) }}">
                            @error('name')
                                <div class="text-danger invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-5 me-3">
                            <label class="form-label">Email</label>
                            <input type="text" class=" form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email', $teacher->email) }}">
                            @error('email')
                                <div class="text-danger invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 col-5 me-3">
                        <label class="form-label">Position</label>
                        <select class="form-select" aria-label="Default select example" name="position">
                            <option value="dean" {{ $teacher->position === 'dean' ? 'selected' : '' }}>Dean</option>
                            <option value="lecturer" {{ $teacher->position === 'lecturer' ? 'selected' : '' }}>Lecturer
                            </option>
                        </select>
                    </div>
                    <button class="btn btn-color">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
