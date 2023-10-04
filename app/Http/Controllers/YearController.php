<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Evaluation;
use App\Models\Subject;
use App\Http\Requests\StoreYearRequest;
use App\Http\Requests\UpdateYearRequest;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('admin-only', Year::class);

        $years = Year::when(request()->has('keyword'), function ($query) {
            $keyword = request()->keyword;
            $query->where("title", "like", "%" . $keyword . "%");
            // $query->orWhere("description", "like", "%" . $keyword . "%");
        })
            ->paginate(8)->withQueryString();

        return view('academic.index', compact('years'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('admin-only', Year::class);
        return view('academic.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreYearRequest $request)
    {
        $this->authorize('admin-only', Year::class);
        Year::create([
            'year' => $request->year,
            'semester' => $request->semester,
            'status' => $request->status
        ]);

        $years = Year::where('year', $request->year)->where('semester', $request->semester)->first();
        $subjects = Subject::all();

        foreach ($subjects as $subject) {
            Evaluation::create([
                'year_id' => $years->id,
                'subject_id' => $subject->id
            ]);
        }

        return redirect()->route('year.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Year $year)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Year $year)
    {
        $this->authorize('admin-only', Year::class);
        return view('academic.edit', compact('year'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateYearRequest $request, Year $year)
    {
        $this->authorize('admin-only', Year::class);
        $year->update([
            'year' => $request->year,
            'semester' => $request->semester,
            'status' => $request->status
        ]);

        return redirect()->route('year.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Year $year)
    {
        $this->authorize('admin-only', Year::class);
        $year->delete();
        return redirect()->back();
    }
}
