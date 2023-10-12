@extends('layouts.app')

@section('content')
    <h4 class="text-white">Update Academic Year</h4>
    <hr class="text-white">
    <form action="{{ route('year.update', $year->id) }}" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
            <label class="form-label">Academic Year</label>
            <input type="text" class=" form-control @error('year') is-invalid @enderror" name="year"
                value="{{ old('year', $year->year) }}">
            @error('year')
                <div class="text-danger invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Semester</label>
            <select class="form-select" aria-label="Default select example" name="semester">
                <option value="0" {{ $year->semester == 0 ? 'selected' : '' }}>1st Semester</option>
                <option value="1" {{ $year->semester == 1 ? 'selected' : '' }}>2nd Semester</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select class="form-select" aria-label="Default select example" name="status">
                <option value="Pending" {{ $year->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Started" {{ $year->status === 'Started' ? 'selected' : '' }}>Started</option>
                <option value="Closed" {{ $year->status === 'Closed' ? 'selected' : '' }}>Closed</option>
            </select>
        </div>
        <button class="btn btn-color">Update</button>
    </form>
@endsection
