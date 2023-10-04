@extends('layouts.app')

@section('content')
    @if (session('message'))
        <div class="alert alert-dark">{{ session('message') }}</div>
    @endif
    <h3>Evaluation Questions</h3>
    <hr>

    <div class="row justify-content-between my-3">
        <div class="col-md-3">
            <a href="{{ route('question.create') }}" class="btn btn-outline-dark">Create</a>
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
                            <a href="{{ route('question.edit', $question->id) }}" class="btn btn-sm btn-outline-dark">
                                <i class=" bi bi-pencil"></i>
                            </a>
                            <button form="questionDeleForm{{ $question->id }}" class=" btn btn-sm btn-outline-dark">
                                <i class=" bi bi-trash"></i>
                            </button>
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
                        <a class="btn btn-sm btn-dark" href="{{ route('question.create') }}">Create
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
