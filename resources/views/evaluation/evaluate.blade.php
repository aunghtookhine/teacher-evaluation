@extends('layouts.evaluation-app')

@section('information')
    <div class="card">
        <div class="card-header">
            Information
        </div>
        <div class="card-body">
            <h5 class="card-title">Teacher Name: {{ $evaluation->subject->teacher->name }}</h5>
            <h5 class="card-title">Subject Code: {{ $evaluation->subject->code }}</h5>
            <h5 class="card-title">Subject Name: {{ $evaluation->subject->name }}</h5>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <h3>Evaluation Questionnaire for Academic</h3>
        <form action="{{ route('evaluation.update', $evaluation->id) }}" method="post">
            @method('put')
            @csrf
            <table class="table table-striped">
                <thead>
                    <th>Question</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                </thead>
                <tbody>

                    @foreach ($questions as $question)
                        <tr>
                            <td>{{ $question->name }}</td>
                            <td>
                                <input type="radio" required name="questionId{{ $question->id }}" value="1">
                            </td>
                            <td>
                                <input type="radio" name="questionId{{ $question->id }}" value="2">
                            </td>
                            <td>
                                <input type="radio" name="questionId{{ $question->id }}" value="3">
                            </td>
                            <td>
                                <input type="radio" name="questionId{{ $question->id }}" value="4">
                            </td>
                            <td>
                                <input type="radio" name="questionId{{ $question->id }}" value="5">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <button class="btn btn-dark">Submit</button>
            </div>
        </form>
    </div>
@endsection
