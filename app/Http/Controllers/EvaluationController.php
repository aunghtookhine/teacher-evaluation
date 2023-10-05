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

        $currentYear = Year::where('status', 'Started')->first();

        $evaluations = Evaluation::where('year_id', $currentYear->id)->whereIn('subject_id', $subjects)->get();

        // return $evaluations;

        return view('evaluation.index', ['evaluations' => $evaluations, 'currentYear' => $currentYear]);
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
        $totalScoreGivenByStudents
            = $request->questionId1 + $request->questionId2 + $request->questionId3
            + $request->questionId4 + $request->questionId5 + $request->questionId6
            + $request->questionId7 + $request->questionId8 + $request->questionId9
            + $request->questionId10;

        $averageTotalScore = $totalScoreGivenByStudents / 10;

        $totalScore = $evaluation->total_mark + $averageTotalScore;
        $totalStudent = $evaluation->total_student + 1;
        $actualResult = $totalScore / $totalStudent;

        $evaluation->update([
            'total_mark' => $totalScore,
            'total_student' => $totalStudent,
            'result' => $actualResult,
        ]);

        $studentId = Student::where('email', Auth::user()->email)->first()->id;
        $subjects = StudentSubject::where('student_id', $studentId)->first()->subjects;
        $subjectsArray = array_map('intval', explode(",", $subjects));
        $newSubjectArray = [];
        foreach ($subjectsArray as $subject) {
            if ($subject !== $evaluation->subject_id) {
                array_push($newSubjectArray, $subject);
            }
        }

        StudentSubject::where('student_id', $studentId)->first()->update([
            'subjects' => implode(",", $newSubjectArray)
        ]);

        return redirect()->route('evaluation.index')->with('message', 'Evaluated Successfully');
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
