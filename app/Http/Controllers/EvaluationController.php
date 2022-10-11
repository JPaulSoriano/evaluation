<?php

namespace App\Http\Controllers;
use App\User;
use App\Question;
use App\Section;
use App\Category;
use App\Evaluation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{

    public function index()
    {
        $faculties = User::role('Faculty')->get();
        return view('evaluations.index',compact('faculties'));
    }

    public function myevaluation()
    {
        $evaluations = Evaluation::where('evaluator_id', Auth::user()->id)->paginate(5);
        return view('evaluations.my-evaluations',compact('evaluations'));
    }

    public function create(User $faculty)
    {
        $sections = Section::all();
        $questions = Question::where('status', '=', '1')->get();
        $categories = Category::all();
        return view('evaluations.create',compact('questions', 'sections', 'faculty', 'categories'));
    }

    public function store(Request $request, User $faculty)
    {
        $request->validate([
            'section_id' => 'required'
        ]);

        $input = $request->all();
        $input['faculty_id'] = $faculty->id;
        Auth::user()->evaluations()->create($input);

        return redirect()->route('evaluations')->with('success','Success!');
    }
}
