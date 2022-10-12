<?php

namespace App\Http\Controllers;
use App\Evaluation;
use App\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $evaluations = Evaluation::latest()->paginate(5);
        return view('reports.index',compact('evaluations'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function show()
    {
        return view('reports.show');
    }

}
