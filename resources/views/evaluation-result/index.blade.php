@extends('layouts.app')

@section('content')
    <h3 class="text-white">Evaluation Results</h3>
    <hr class="text-white">
    @if (Auth::user()->role === 'admin')
        <div class="row my-3">
            <form action="{{ route('result.indexAll') }}" method="get">
                <div class="d-flex justify-content-end">
                    <div class="col-md-5">
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword" placeholder="Search..."
                                @if (request()->has('keyword')) value="{{ request()->keyword }}" @endif>
                            @if (request()->has('keyword'))
                                <a href="{{ route('result.indexAll') }}" class="btn btn-color"><i class="bi bi-x"></i></a>
                            @endif
                            <button class="btn btn-color"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                {{-- <th class="text-end">#</th> --}}
                <th class="text-end">Academic</th>
                <th class="text-end">Semester</th>
                <th>Year</th>
                <th>Subject</th>
                <th>Teacher</th>
                <th class="text-end">No. S.</th>
                <th>Rating</th>
                <th style="width: 200px">Result</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($evaluations as $evaluation)
                <tr>
                    {{-- <td class="text-end">{{ $evaluation->id }}</td> --}}
                    <td class="text-end">{{ $evaluation->year }}</td>
                    <td class="text-end">{{ $evaluation->semester + 1 }}</td>
                    <td>{{ $evaluation->subject->grade->name }}</td>
                    <td>{{ $evaluation->subject->name }}</td>
                    <td>{{ $evaluation->subject->teacher->name }}</td>
                    <td class="text-end">{{ $evaluation->total_student }}</td>
                    <td class="text-end">{{ $evaluation->result }}/5</td>
                    <td>
                        <div class="progress" data-toggle="tooltip" data-html="true"
                            title=" @if ($evaluation->result >= 4) Highly Effective
                    @elseif ($evaluation->result >= 3 && $evaluation->result < 4)
                        Effective
                    @elseif ($evaluation->result >= 2 && $evaluation->result < 3)
                        Partially Effective
                    @elseif ($evaluation->result >= 1 && $evaluation->result < 2)
                        Ineffective
                    @else
                        No Comment @endif">
                            <div class="progress-bar @if ($evaluation->result >= 4) bg-success
                                @elseif ($evaluation->result >= 3 && $evaluation->result < 4)
                                    bg-info
                                @elseif ($evaluation->result >= 2 && $evaluation->result < 3)
                                    bg-warning
                                @elseif ($evaluation->result >= 1 && $evaluation->result < 2)
                                    bg-danger @endif"
                                role="progressbar" style="width: {{ ($evaluation->result / 5) * 100 }}%"
                                aria-valuenow="{{ $evaluation->result }}" aria-valuemin="0" aria-valuemax="5">
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center p-3">
                        <p>There is no result.</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="example">
        @if ($evaluations)
            {{ $evaluations->onEachSide(1)->links() }}
        @endif
    </div>
@endsection
