@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4>Create New Subject</h4>
                <hr>

                <form action=" {{ route('subject.store') }} " method="post">
                    @csrf
                    <div class="d-flex">
                        <div class="mb-3 col-5 me-3">
                            <label class="form-label">Code</label>
                            <input type="text" class=" form-control @error('code') is-invalid @enderror" name="code"
                                placeholder="Example: IT-12345"="{{ old('code') }}">
                            @error('code')
                                <div class="text-danger invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-5 me-3">
                            <label class="form-label">Name</label>
                            <input type="text" class=" form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="mb-3 col-5 me-3">
                            <label class="form-label">Class</label>
                            <select class="form-select" aria-label="Default select example" name="grade_id">
                                @foreach (App\Models\Grade::all() as $grade)
                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-5 me-3">
                            <label class="form-label">Teacher</label>
                            <select class="form-select" aria-label="Default select example" name="teacher_id">
                                <option value="{{ null }}">Default</option>
                                @foreach (App\Models\Teacher::all() as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-dark">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
