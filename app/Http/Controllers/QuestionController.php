<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('admin-only', Question::class);
        $questions = Question::when(request()->has('keyword'), function ($query) {
            $keyword = request()->keyword;
            $query->where("name", "like", "%" . $keyword . "%");
            // $query->orWhere("description", "like", "%" . $keyword . "%");
        })
            ->paginate(10)->withQueryString();

        return view('question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('admin-only', Question::class);
        return view('question.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionRequest $request)
    {
        $this->authorize('admin-only', Question::class);
        Question::create([
            'name' => $request->name
        ]);

        return redirect()->route('question.index')->with('message', 'Question successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        $this->authorize('admin-only', Question::class);
        return view('question.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $this->authorize('admin-only', Question::class);
        $question->update([
            'name' => $request->name
        ]);
        return redirect()->route('question.index')->with('message', 'Question successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $this->authorize('admin-only', Question::class);
        $question->delete();
        return redirect()->back();
    }
}
