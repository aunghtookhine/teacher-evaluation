@extends('layouts.app')

@section('content')
    @if (request()->has('keyword'))
        <p>Search result by '{{ request()->keyword }}'</p>
    @endif

    @if (session('message'))
        <div class="alert alert-dark">{{ session('message') }}</div>
    @endif

    <h4>Teacher List</h4>

    <div class="row justify-content-between my-3">
        <div class="col-md-3">
            <a href="{{ route('teacher.create') }}" class="btn btn-outline-dark">Create</a>
        </div>
        <div class="col-md-5">
            <form action=" {{ route('teacher.index') }}" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" name="keyword"
                        @if (request()->has('keyword')) value="{{ request()->keyword }}" @endif>
                    @if (request()->has('keyword'))
                        <a href="{{ route('teacher.index') }}" class="btn btn-dark"><i class="bi bi-x"></i></a>
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
                <th>Name</th>
                <th>Email</th>
                <th>Position</th>
                <th>Control</th>
                <th>Updated At</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->id }}</td>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>{{ Str::ucfirst($teacher->position) }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('teacher.show', $teacher->id) }}" class="btn btn-sm btn-outline-dark">
                                <i class=" bi bi-info"></i>
                            </a>
                            <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn btn-sm btn-outline-dark">
                                <i class=" bi bi-pencil"></i>
                            </a>
                            <button form="teacherDeleForm{{ $teacher->id }}" class=" btn btn-sm btn-outline-dark">
                                <i class=" bi bi-trash"></i>
                            </button>
                        </div>
                        <form id="teacherDeleForm{{ $teacher->id }}" class="d-inline-block"
                            action="{{ route('teacher.destroy', $teacher->id) }}" method="post">
                            @method('delete')
                            @csrf
                        </form>
                    </td>
                    <td>
                        <p class="small mb-0">
                            <i class="bi bi-clock"></i>
                            {{ $teacher->created_at->format('h:i a') }}
                        </p>
                        <p class="small mb-0">
                            <i class="bi bi-calendar"></i>
                            {{ $teacher->created_at->format('d M Y') }}
                        </p>
                    </td>
                    <td>
                        <p class="small mb-0"><i class="bi bi-clock"></i>
                            {{ $teacher->updated_at->format('h:i a') }}</p>
                        <p class="small mb-0"><i class="bi bi-calendar"></i>
                            {{ $teacher->updated_at->format('d M Y') }}</p>
                    </td>
                </tr>


            @empty
                <tr>
                    <td colspan="7" class=" text-center p-3">
                        <p>There is no teacher.</p>
                        <a class="btn btn-sm btn-dark" href="{{ route('teacher.create') }}">Create
                            teacher</a>
                    </td>

                </tr>
            @endforelse
        </tbody>
    </table>

    <div>
        {{ $teachers->onEachSide(1)->links() }}
    </div>
@endsection
