<?php

namespace App\Http\Controllers;
use App\Question;
use App\Category;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:admin');
    }

    public function index()
    {
        $questions = Question::all();
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
        $question->status = 1;
        $question->save();
        return redirect()->route('questions.index');
    }

    public function deactivate(Question $question)
    {
        $question->status = 0;
        $question->save();
        return redirect()->route('questions.index');
    }

    public function massAction(Request $request)
{
    $request->validate([
        'action' => 'required',
        'questions' => 'required|array',
    ]);

    $action = $request->input('action');
    $questionIds = $request->input('questions');

    $questions = Question::whereIn('id', $questionIds)->get();

    foreach ($questions as $question) {
        if ($action == 'activate') {
            $question->status = 1;
        } elseif ($action == 'deactivate') {
            $question->status = 0;
        }

        $question->save();
    }

    $message = count($questionIds) . ' questions ' . $action . 'd successfully.';
    return redirect()->route('questions.index')->with('success', $message);
}

}
