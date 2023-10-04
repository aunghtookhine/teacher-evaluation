@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4>Update Subject</h4>
                <hr>

                <form action=" {{ route('subject.update', $subject->id) }} " method="post">
                    @csrf
                    @method('put')
                    <div class="d-flex">
                        <div class="mb-3 col-5 me-3">
                            <label class="form-label">Code</label>
                            <input type="text" class=" form-control @error('code') is-invalid @enderror" name="code"
                                placeholder="Example: IT-12345" value="{{ old('code', $subject->code) }}">
                            @error('code')
                                <div class="text-danger invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-5 me-3">
                            <label class="form-label">Name</label>
                            <input type="text" class=" form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name', $subject->name) }}">
                            @error('name')
                                <div class="text-danger invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="mb-3 col-5 me-3">
                            <label class="form-label">Teacher</label>
                            <select class="form-select" aria-label="Default select example" name="teacher_id">
                                <option value="{{ null }}" {{ null === $subject->teacher_id ? 'selected' : '' }}>
                                    Default</option>
                                @foreach (App\Models\Teacher::all() as $teacher)
                                    <option value="{{ $teacher->id }}"
                                        {{ $teacher->id === $subject->teacher_id ? 'selected' : '' }}>{{ $teacher->name }}
                                    </option>
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
