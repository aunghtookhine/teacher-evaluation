<?php

namespace App\Http\Controllers;

use App\Models\grade;
use App\Http\Requests\StoregradeRequest;
use App\Http\Requests\UpdategradeRequest;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('admin-only', Grade::class);
        $grades = Grade::when(request()->has('keyword'), function ($query) {
            $keyword = request()->keyword;
            $query->where("name", "like", "%" . $keyword . "%");
            // $query->orWhere("description", "like", "%" . $keyword . "%");
        })
            ->paginate(8)->withQueryString();

        return view('grade.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('admin-only', Grade::class);
        return view('grade.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoregradeRequest $request)
    {
        $this->authorize('admin-only', Grade::class);
        Grade::create([
            "name" => $request->name
        ]);

        return redirect()->route('grade.index')->with('message', $request->name . ' is created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdategradeRequest $request, grade $grade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(grade $grade)
    {
        $this->authorize('admin-only', Grade::class);
        $grade->delete();
        return redirect()->back();
    }
}
