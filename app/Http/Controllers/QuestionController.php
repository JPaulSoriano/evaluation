<?php

namespace App\Http\Controllers;
use App\Question;
use App\Category;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::latest()->paginate(5);
        return view('questions.index',compact('questions'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $categories = Category::all();
        return view('questions.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'category_id' => 'required',
        ]);

        Question::create($request->all());

        return redirect()->route('questions.index')
                        ->with('success','Question added successfully.');
    }

    public function activate(Question $question)
    {
        $question->status = '1';
        $question->save();
        return redirect()->route('questions.index');
    }

    public function deactivate(Question $question)
    {
        $question->status = '0';
        $question->save();
        return redirect()->route('questions.index');
    }
}
