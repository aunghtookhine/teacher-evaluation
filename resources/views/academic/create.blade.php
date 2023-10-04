@extends('layouts.app')

@section('content')
    <h4>Create New Academic Year</h4>
    <hr>
    <form action="{{ route('year.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Academic Year</label>
            <input type="text" class=" form-control @error('year') is-invalid @enderror" name="year"
                value="{{ old('year') }}" placeholder="Example - 2022-2023">
            @error('year')
                <div class="text-danger invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Semester</label>
            <select class="form-select" aria-label="Default select example" name="semester">
                <option value="0">1st Semester</option>
                <option value="1">2nd Semester</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select class="form-select" aria-label="Default select example" name="status">
                <option value="Pending">Pending</option>
                <option value="Started">Started</option>
                <option value="Closed">Closed</option>
            </select>
        </div>
        <button class="btn btn-dark">Create</button>
    </form>
@endsection
