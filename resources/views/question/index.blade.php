@extends('layouts.app')

@section('content')
    <h3 class="text-white">Evaluation Questions</h3>
    <hr class="text-white">

    <div class="row my-3">
        <div class="col-12 d-flex justify-content-end">
            @if (session('message'))
                <div class="toast show align-items-center text-black bg-white border-0" role="alert" aria-live="assertive"
                    aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body text-black">
                            {{ session('message') }}
                        </div>
                        <button type="button" class=" btn-close btn-close-black me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close">
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Question</th>
                <th>Control</th>
                <th>Updated At</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($questions as $question)
                <tr>
                    <td>{{ $question->id }}</td>
                    <td>{{ $question->name }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('question.edit', $question->id) }}" class="btn btn-sm btn-outline-color">
                                <i class=" bi bi-pencil"></i>
                            </a>
                            {{-- <button form="questionDeleForm{{ $question->id }}" class=" btn btn-sm btn-outline-color">
                                <i class=" bi bi-trash"></i>
                            </button> --}}
                        </div>
                        <form id="questionDeleForm{{ $question->id }}" class="d-inline-block"
                            action="{{ route('question.destroy', $question->id) }}" method="post">
                            @method('delete')
                            @csrf
                        </form>
                    </td>
                    <td>
                        <p class="small mb-0">
                            <i class="bi bi-clock"></i>
                            {{ $question->created_at->format('h:i a') }}
                        </p>
                        <p class="small mb-0">
                            <i class="bi bi-calendar"></i>
                            {{ $question->created_at->format('d M Y') }}
                        </p>
                    </td>
                    <td>
                        <p class="small mb-0"><i class="bi bi-clock"></i>
                            {{ $question->updated_at->format('h:i a') }}</p>
                        <p class="small mb-0"><i class="bi bi-calendar"></i>
                            {{ $question->updated_at->format('d M Y') }}</p>
                    </td>
                </tr>


            @empty
                <tr>
                    <td colspan="8" class=" text-center p-3">
                        <p>There is no question.</p>
                        <a class="btn btn-sm btn-color" href="{{ route('question.create') }}">Create
                            question</a>
                    </td>

                </tr>
            @endforelse
        </tbody>
    </table>

    <div>
        {{ $questions->onEachSide(1)->links() }}
    </div>
@endsection
