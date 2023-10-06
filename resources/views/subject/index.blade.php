@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            @if (request()->has('keyword'))
                <p>Search result by '{{ request()->keyword }}'</p>
            @endif
        </div>
        <div>
            @if (session('message'))
                <div class="toast show align-items-center text-white bg-black border-0" role="alert" aria-live="assertive"
                    aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body text-white">
                            {{ session('message') }}
                        </div>
                        <button type="button" class=" btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close">
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>



    <h4>Subject List</h4>

    <div class="row justify-content-between my-3">
        <div class="col-md-3">
            <a href="{{ route('subject.create') }}" class="btn btn-outline-dark">Create</a>
        </div>
        <div class="col-md-5">
            <form action=" {{ route('subject.index') }}" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" name="keyword"
                        @if (request()->has('keyword')) value="{{ request()->keyword }}" @endif>
                    @if (request()->has('keyword'))
                        <a href="{{ route('subject.index') }}" class="btn btn-dark"><i class="bi bi-x"></i></a>
                    @endif
                    <button class="btn btn-dark"><i class="bi bi-search"></i></button>
                </div>
            </form>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>Name</th>
                <th>Assigned Teacher</th>
                <th>Control</th>
                <th>Updated At</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($subjects as $subject)
                <tr>
                    <td>{{ $subject->id }}</td>
                    <td>{{ $subject->code }}</td>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->teacher_id === null ? 'Not Assigned' : $subject->teacher->name }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('subject.show', $subject->id) }}" class="btn btn-sm btn-outline-dark">
                                <i class=" bi bi-info"></i>
                            </a>
                            <a href="{{ route('subject.edit', $subject->id) }}" class="btn btn-sm btn-outline-dark">
                                <i class=" bi bi-pencil"></i>
                            </a>
                            <button form="subjectDeleForm{{ $subject->id }}" class=" btn btn-sm btn-outline-dark">
                                <i class=" bi bi-trash"></i>
                            </button>
                        </div>
                        <form id="subjectDeleForm{{ $subject->id }}" class="d-inline-block"
                            action="{{ route('subject.destroy', $subject->id) }}" method="post">
                            @method('delete')
                            @csrf
                        </form>
                    </td>
                    <td>
                        <p class="small mb-0">
                            <i class="bi bi-clock"></i>
                            {{ $subject->created_at->format('h:i a') }}
                        </p>
                        <p class="small mb-0">
                            <i class="bi bi-calendar"></i>
                            {{ $subject->created_at->format('d M Y') }}
                        </p>
                    </td>
                    <td>
                        <p class="small mb-0"><i class="bi bi-clock"></i>
                            {{ $subject->updated_at->format('h:i a') }}</p>
                        <p class="small mb-0"><i class="bi bi-calendar"></i>
                            {{ $subject->updated_at->format('d M Y') }}</p>
                    </td>
                </tr>


            @empty
                <tr>
                    <td colspan="7" class=" text-center p-3">
                        <p>There is no subject.</p>
                        <a class="btn btn-sm btn-dark" href="{{ route('subject.create') }}">Create
                            Subject</a>
                    </td>

                </tr>
            @endforelse
        </tbody>
    </table>

    <div>
        {{ $subjects->onEachSide(1)->links() }}
    </div>
@endsection
