@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="text-white">Edit Evaluation Question</h3>
                <hr class="text-white">
                <form action="{{ route('question.update', $question->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label class="form-label text-white">Question Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name', $question->name) }}">
                        @error('name')
                            <div class="text-danger invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-color">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
