@extends('layouts.app')

@section('content')
    <h3>Academic Year List</h3>
    <hr>

    <div class="my-3 d-flex justify-content-between align-items-center">
        <div class="col-md-3">
            <a href="{{ route('year.create') }}" class="btn btn-outline-dark">Create</a>
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
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Academic Year</th>
                <th>Semester</th>
                <th>Status</th>
                <th>Control</th>
                <th>Updated At</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($years as $year)
                <tr>
                    <td>{{ $year->id }}</td>
                    <td>{{ $year->year }}</td>
                    <td>{{ $year->semester == 0 ? '1st' : '2nd' }}</td>
                    <td>{{ $year->status }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('year.edit', $year->id) }}" class="btn btn-sm btn-outline-dark">
                                <i class=" bi bi-pencil"></i>
                            </a>
                            {{-- <button form="yearDeleForm{{ $year->id }}" class=" btn btn-sm btn-outline-dark">
                                <i class=" bi bi-trash"></i>
                            </button>
                            <a href="{{ route('year.edit', $year->id) }}" class="btn btn-sm btn-outline-dark">
                                <i class=" bi bi-pencil"></i>
                            </a> --}}
                        </div>
                        <form id="yearDeleForm{{ $year->id }}" class="d-inline-block"
                            action="{{ route('year.destroy', $year->id) }}" method="post">
                            @method('delete')
                            @csrf
                        </form>
                    </td>
                    <td>
                        <p class="small mb-0">
                            <i class="bi bi-clock"></i>
                            {{ $year->created_at->format('h:i a') }}
                        </p>
                        <p class="small mb-0">
                            <i class="bi bi-calendar"></i>
                            {{ $year->created_at->format('d M Y') }}
                        </p>
                    </td>
                    <td>
                        <p class="small mb-0"><i class="bi bi-clock"></i>
                            {{ $year->updated_at->format('h:i a') }}</p>
                        <p class="small mb-0"><i class="bi bi-calendar"></i>
                            {{ $year->updated_at->format('d M Y') }}</p>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class=" text-center p-3">
                        <p>There is no academic year.</p>
                        <a class="btn btn-sm btn-dark" href="{{ route('year.create') }}">Create
                            year</a>
                    </td>

                </tr>
            @endforelse
        </tbody>
    </table>

    <div>
        {{ $years->onEachSide(1)->links() }}
    </div>
@endsection
