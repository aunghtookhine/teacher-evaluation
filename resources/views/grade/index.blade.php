@extends('layouts.app')

@section('content')
    <h4 class="text-white">Class List</h4>
    <hr class="text-white">
    <div class="d-flex justify-content-between align-items-center">
        <div class="row my-3">
            <div class="col-md-3">
                <a href="{{ route('grade.create') }}" class="btn btn-color">Create</a>
            </div>
        </div>
        <div>
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
                <th>Name</th>
                <th>Control</th>
                <th>Updated At</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($grades as $grade)
                <tr>
                    <td>{{ $grade->id }}</td>
                    <td>{{ $grade->name }}</td>
                    <td>
                        <div class="btn-group">
                            <button form="gradeDeleForm{{ $grade->id }}" class=" btn btn-sm btn-outline-color">
                                <i class=" bi bi-trash"></i>
                            </button>
                        </div>
                        <form id="gradeDeleForm{{ $grade->id }}" class="d-inline-block"
                            action="{{ route('grade.destroy', $grade->id) }}" method="post">
                            @method('delete')
                            @csrf
                        </form>
                    </td>
                    <td>
                        <p class="small mb-0">
                            <i class="bi bi-clock"></i>
                            {{ $grade->created_at->format('h:i a') }}
                        </p>
                        <p class="small mb-0">
                            <i class="bi bi-calendar"></i>
                            {{ $grade->created_at->format('d M Y') }}
                        </p>
                    </td>
                    <td>
                        <p class="small mb-0"><i class="bi bi-clock"></i>
                            {{ $grade->updated_at->format('h:i a') }}</p>
                        <p class="small mb-0"><i class="bi bi-calendar"></i>
                            {{ $grade->updated_at->format('d M Y') }}</p>
                    </td>
                </tr>


            @empty
                <tr>
                    <td colspan="5" class=" text-center p-3">
                        <p>There is no class.</p>
                        <a class="btn btn-sm btn-color" href="{{ route('grade.create') }}">Create
                            grade</a>
                    </td>

                </tr>
            @endforelse
        </tbody>
    </table>

    <div>
        {{ $grades->onEachSide(1)->links() }}
    </div>
@endsection
