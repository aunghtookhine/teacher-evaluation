<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('admin-only', Subject::class);
        $subjects = Subject::where('isArchived', false)->when(request()->has('keyword'), function ($query) {
            $keyword = request()->keyword;
            $query->where("name", "like", "%" . $keyword . "%");
        })->paginate(8)->withQueryString();

        return view('subject.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('admin-only', Subject::class);
        return view('subject.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectRequest $request)
    {
        $this->authorize('admin-only', Subject::class);
        Subject::create([
            'code' => $request->code,
            'name' => $request->name,
            'grade_id' => $request->grade_id,
            'teacher_id' => $request->teacher_id,
        ]);

        return redirect()->route('subject.index')->with('message', 'You have successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        $this->authorize('admin-only', Subject::class);
        return view('subject.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $this->authorize('admin-only', Subject::class);
        $subject->update([
            'code' => $request->code,
            'name' => $request->name,
            'teacher_id' => $request->teacher_id
        ]);
        return redirect()->route('subject.index')->with('message', 'You have successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $this->authorize('admin-only', Subject::class);
        $subject->update([
            'isArchived' => true
        ]);
        return redirect()->route('subject.index')->with('message', 'You have successfully deleted.');
    }
}
