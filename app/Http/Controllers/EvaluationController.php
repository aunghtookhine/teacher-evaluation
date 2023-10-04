<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Year;
use App\Models\Subject;
use App\Models\Student;
use App\Http\Requests\StoreEvaluationRequest;
use App\Http\Requests\UpdateEvaluationRequest;
use App\Models\Question;
use App\Models\StudentSubject;
use Faker\Core\Number;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\map;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('student-only', Evaluation::class);
        $studentId = Student::where('name', Auth::user()->name)->first()->id;
        $subjects = array_map(
            'intval',
            explode(
                ",",
                StudentSubject::where('student_id', $studentId)->first()->subjects
            )
        );

        $currentYearId = Year::where('status', 'Started')->first()->id;

        $evaluations = Evaluation::where('year_id', $currentYearId)->whereIn('subject_id', $subjects)->get();

        return view('evaluation.index', compact("evaluations"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEvaluationRequest $request)
    {
        return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(Evaluation $evaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evaluation $evaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEvaluationRequest $request, Evaluation $evaluation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $evaluation)
    {
        //
    }

    public function evaluate(Evaluation $evaluation)
    {
        $questions = Question::all();
        return view('evaluation.evaluate', ['evaluation' => $evaluation, 'questions' => $questions]);
    }

    // public function evaluate(){

    //     $year = Year::where('status', 'Started')->first();

    //     $email = Auth::user()->email;
    //     $student = Student::where('email', $email)->first();

    //     $subjects = Subject::where('grade_id', $student->grade_id)->get();

    //     return view('evaluation.evaluate', ['year'=>$year, 'subjects' => $subjects]);
    // }
}
