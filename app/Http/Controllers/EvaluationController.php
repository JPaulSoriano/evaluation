<?php

namespace App\Http\Controllers;
use App\User;
use App\Question;
use App\Section;
use App\Category;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{

    public function index()
    {
        $faculties = User::role('Faculty')->get();
        return view('evaluations.index',compact('faculties'));
    }

    public function create(User $faculty)
    {
        $sections = Section::all();
        $questions = Question::where('status', '=', '1')->get();
        $categories = Category::all();
        return view('evaluations.create',compact('questions', 'sections', 'faculty', 'categories'));
    }
}
