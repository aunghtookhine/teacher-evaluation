@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4>Evaluate Teachers</h4>
                <h5>Academic Year: {{ $evaluations[0]->year->year }}</h5>
                <h5>Semester: {{ $evaluations[0]->year->semester + 1 }}</h5>

                <table class="table table-hover evaluationTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Subject Code</th>
                            <th>Subject Name</th>
                            <th>Evaluate</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($evaluations as $evaluation)
                            <tr class="evaluationRow-{{ $evaluation->id }}">
                                <td>{{ $evaluation->id }}</td>
                                <td>{{ $evaluation->subject->code }}</td>
                                <td>{{ $evaluation->subject->name }}</td>
                                <td><a href="{{ route('evaluation.evaluate', $evaluation->id) }}"
                                        class="btn btn-sm btn-outline-dark">
                                        <i class=" bi bi-clipboard2-check"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
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
                <button class="btn btn-dark float-end submitBtn">Submit</button>
            </form>
        </div>
    </div>
</div> --}}
