<?php

namespace App\Http\Controllers;
use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:admin');
    }

    public function index()
    {
        $subjects = Subject::latest()->paginate(5);
        return view('subjects.index',compact('subjects'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Subject::create($request->all());

        return redirect()->route('subjects.index')
                        ->with('success','Subject added successfully.');
    }

}
