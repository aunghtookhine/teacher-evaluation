<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    public function index()
    {
        $this->authorize('teacher-only', Evaluation::class);
        $teacherId = Teacher::where('email', Auth::user()->email)->first()->id;
        $subjects = Subject::where('teacher_id', $teacherId)->get();
        $subjectIds = [];
        foreach ($subjects as $subject) {
            array_push($subjectIds, $subject->id);
        }

        $evaluations = Evaluation::join('subjects', 'subjects.id', '=', 'evaluations.subject_id')
            ->join('years', 'years.id', '=', 'evaluations.year_id')
            ->join('teachers', 'teachers.id', '=', 'subjects.teacher_id')
            ->join('grades', 'grades.id', '=', 'subjects.grade_id')
            ->whereIn('subject_id', $subjectIds)->paginate(8)->withQueryString();

        return view('evaluation-result.index', compact('evaluations'));
    }

    public function indexAll()
    {
        $this->authorize('admin-only', Evaluation::class);
        $currentYear = Year::where('status', 'Started')->first();
        $evaluations = Evaluation::join('subjects', 'subjects.id', '=', 'evaluations.subject_id')
            ->join('years', 'years.id', '=', 'evaluations.year_id')
            ->join('teachers', 'teachers.id', '=', 'subjects.teacher_id')
            ->join('grades', 'grades.id', '=', 'subjects.grade_id')
            ->when(request()->has('keyword'), function ($query) {
                $keyword = request()->keyword;
                $query
                    ->where('grades.name', "like", "%" . $keyword . "%")
                    ->orWhere('teachers.name', "like", "%" . $keyword . "%")
                    ->orWhere('years.year', "like", "%" . $keyword . "%")
                    ->orWhere('subjects.name', "like", "%" . $keyword . "%");
            })
            ->paginate(8)->withQueryString();
        return view('evaluation-result.index', compact('evaluations'));

        // $evaluations = [];
        // return view('evaluation-result.index', compact('evaluations'));
    }
}
