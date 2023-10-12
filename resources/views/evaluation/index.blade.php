@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="text-white">Evaluate Teachers</h4>
                    </div>
                    <div>
                        @if (session('message'))
                            <div class="toast show align-items-center text-black bg-white border-0" role="alert"
                                aria-live="assertive" aria-atomic="true">
                                <div class="d-flex">
                                    <div class="toast-body text-black">
                                        {{ session('message') }}
                                    </div>
                                    <button type="button" class=" btn-close btn-close-black me-2 m-auto"
                                        data-bs-dismiss="toast" aria-label="Close">
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <hr class="text-white">

                <table class="table table-hover evaluationTable mt-2">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Subject Code</th>
                            <th>Subject Name</th>
                            <th>Evaluate</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($evaluations as $evaluation)
                            <tr class="evaluationRow-{{ $evaluation->id }}">
                                <td>{{ $evaluation->id }}</td>
                                <td>{{ $evaluation->subject->code }}</td>
                                <td>{{ $evaluation->subject->name }}</td>
                                <td><a href="{{ route('evaluation.evaluate', $evaluation->id) }}"
                                        class="btn btn-sm table-btn-outline-color">
                                        <i class=" bi bi-clipboard2-check"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class=" text-center p-3">
                                    <p>You have no teachers to evaluate.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection



{{-- @vite('resources/js/questionForm.js')

<div class="questionForm position-absolute bottom-100 bg-white z-1 p-3 w-50">
    <div class="d-flex justify-content-center align-items-center w-100">
        <div style="font-size: 20px; width: 100%">
            <span>Subject: </span><br>
            <span>Teacher: </span>
            <form action="">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Questions</th>
                            <th>
                                Ratings
                            </th>
                        </tr>
                    </thead>

                    @foreach ($questions as $question)
                        <tr>
                            <td>{{ $question->name }}</td>
                            <td>
                                <input type="radio" name="" id="">
                                <input type="radio" name="" id="">
                                <input type="radio" name="" id="">
                                <input type="radio" name="" id="">
                                <input type="radio" name="" id="">
                            </td>
                        </tr>
                    @endforeach
                </table>
                <button class="btn btn-color float-end submitBtn">Submit</button>
            </form>
        </div>
    </div>
</div> --}}
