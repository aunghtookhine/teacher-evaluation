<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\StudentSubject;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('admin-only', Student::class);
        $students = Student::when(request()->has('keyword'), function ($query) {
            $keyword = request()->keyword;
            $query->where("title", "like", "%" . $keyword . "%");
            // $query->orWhere("description", "like", "%" . $keyword . "%");
        })
            ->when(request()->has('title'), function ($query) {
                $sortType = request()->title ?? 'asc';
                $query->orderBy("title", $sortType);
            })
            ->paginate(8)->withQueryString();

        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('admin-only', Student::class);
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $this->authorize('admin-only', Student::class);
        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roll_number' => $request->roll_number,
            'grade_id' => $request->grade_id
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        $subjects = Subject::where('grade_id', $request->grade_id)->get();
        $ids = [];
        foreach ($subjects as $subject) {
            array_push($ids, $subject->id);
        }
        StudentSubject::create([
            'name' => $request->name,
            'subjects' => implode(",", $ids),
        ]);

        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $this->authorize('admin-only', Student::class);
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $this->authorize('admin-only', Student::class);
        User::all()->where('email', $student->email)->first()->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'roll_number' => $request->roll_number,
            'grade_id' => $request->grade_id
        ]);

        return redirect()->route('student.index')->with('message', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $this->authorize('admin-only', Student::class);
        User::all()->where('email', $student->email)->first()->delete();
        $student->delete();
        return redirect()->back();
    }
}
