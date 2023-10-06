<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('admin-only', Teacher::class);
        $teachers = Teacher::where('isArchived', false)->when(request()->has('keyword'), function ($query) {
            $keyword = request()->keyword;
            $query->where("name", "like", "%" . $keyword . "%");
        })->paginate(8)->withQueryString();

        return view('teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('admin-only', Teacher::class);
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
        $this->authorize('admin-only', Teacher::class);
        Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'position' => $request->position
        ]);

        $role = $request->role;

        if ($request->position === 'dean') {
            $role = 'admin';
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $role;
        $user->save();

        return redirect()->route('teacher.index')->with('message', 'You have been successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        $this->authorize('admin-only', Teacher::class);
        return view('teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $this->authorize('admin-only', Teacher::class);
        User::all()->where('email', $teacher->email)->first()->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        $teacher->update([
            'name' => $request->name,
            'email' => $request->email,
            'position' => $request->position
        ]);

        return redirect()->route('teacher.index')->with('message', 'You have successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $this->authorize('admin-only', Teacher::class);
        User::all()->where('email', $teacher->email)->first()->delete();
        $teacher->update([
            'isArchived' => true
        ]);
        return redirect()->route('teacher.index')->with('message', 'You have successfully deleted.');
    }
}
