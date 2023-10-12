@extends('layouts.app')

@section('content')
    <h4 class="text-white">Create New Class</h4>
    <hr class="text-white">
    <form action=" {{ route('grade.store') }} " method="post">
        @csrf

        <div class="mb-3">
            <label class="form-label">Class Name</label>
            <input type="text" class=" form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name') }}" placeholder="Example: 1-IT">
            @error('name')
                <div class="text-danger invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-color">Save</button>
    </form>
@endsection
