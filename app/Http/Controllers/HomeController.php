<?php

namespace App\Http\Controllers;
use App\AcademicYear;
use App\Evaluation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $academicyears = AcademicYear::first();
        $totalevaluations = Evaluation::count();
        return view('home', compact('academicyears', 'totalevaluations'));
    }
}
