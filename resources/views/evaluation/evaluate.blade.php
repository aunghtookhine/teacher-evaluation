@extends('layouts.evaluation-app')

@section('information')
    <div class="card">
        <div class="card-header text-white">
            Information of teacher
        </div>
        <div class="card-body">
            <table class="w-100">
                <tr>
                    <td>Teacher Name:</td>
                    <td class="text-end">{{ $evaluation->subject->teacher->name }}</td>
                </tr>
                <tr>
                    <td>Subject Code:</td>
                    <td class="text-end">{{ $evaluation->subject->code }}</td>
                </tr>
                <tr>
                    <td>Subject Name:</td>
                    <td class="text-end">{{ $evaluation->subject->name }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <h3 class="text-white">Evaluation Questionnaire for Academic</h3>
        <hr class="text-white">
        <form action="{{ route('evaluation.update', $evaluation->id) }}" method="post" class="mt-3">
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
                <button class="btn btn-color">Submit</button>
            </div>
        </form>
    </div>
@endsection
