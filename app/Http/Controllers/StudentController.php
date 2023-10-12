<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\StudentSubject;
use App\Models\Subject;
use App\Models\Year;
use App\Models\YearStudentSubject;
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
        $students = Student::where('isArchived', false)->when(request()->has('keyword'), function ($query) {
            $keyword = request()->keyword;
            $query->where("name", "like", "%" . $keyword . "%");
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

        $this->validate($request, [
            "email" => 'required|unique:users,email,'
        ]);

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

        $studentId = Student::where('email', $request->email)->first()->id;
        $isExisted = YearStudentSubject::where('student_id', $studentId)->first();
        $subjects = Subject::where('grade_id', $request->grade_id)->get();
        $years = Year::where('status', "!=", "Started")->get();

        if (!$isExisted) {
            foreach ($years as $year) {
                foreach ($subjects as $subject) {
                    YearStudentSubject::create([
                        'year_id' => $year->id,
                        'student_id' => $studentId,
                        'subject_id' => $subject->id
                    ]);
                }
            }
        }

        return redirect()->route('student.index')->with('message', 'You have successfully created.');
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
        $userId = User::where('email', $student->email)->first()->id;
        $this->validate($request, [
            "email" => 'required|unique:users,email,' . $userId
        ]);
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

        return redirect()->route('student.index')->with('message', 'You have successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $this->authorize('admin-only', Student::class);
        User::all()->where('email', $student->email)->first()->delete();
        $student->update([
            'roll_number' => null,
            'isArchived' => true
        ]);
        return redirect()->back()->with('message', 'You have successfully deleted.');
    }
}
