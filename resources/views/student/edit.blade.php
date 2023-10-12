@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="text-white">Update Student Information</h3>
                <hr class="text-white">

                <form action=" {{ route('student.update', $student->id) }} " method="post">
                    @method('put')
                    @csrf

                    <div class="d-flex">
                        <div class="mb-3 col-5 me-3">
                            <label class="form-label">Name</label>
                            <input type="text" class=" form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name', $student->name) }}">
                            @error('name')
                                <div class="text-danger invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-5 me-3">
                            <label class="form-label">Email</label>
                            <input type="text" class=" form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email', $student->email) }}">
                            @error('email')
                                <div class="text-danger invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="mb-3 col-5 me-3">
                            <label class="form-label">Roll Number</label>
                            <input type="text" class=" form-control @error('roll_number') is-invalid @enderror"
                                name="roll_number" value="{{ old('roll_number', $student->roll_number) }}">
                            @error('roll_number')
                                <div class="text-danger invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-5 me-3">
                            <label class="form-label">Class</label>
                            <select class="form-select" aria-label="Default select example" name="grade_id">
                                @foreach (App\Models\Grade::all() as $grade)
                                    <option value="{{ $grade->id }}"
                                        {{ $student->grade_id === $grade->id ? 'selected' : '' }}>{{ $grade->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button class="btn btn-color">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
