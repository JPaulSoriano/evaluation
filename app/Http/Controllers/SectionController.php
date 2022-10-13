<?php

namespace App\Http\Controllers;
use App\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:admin');
    }

    public function index()
    {
        $sections = Section::latest()->paginate(5);
        return view('sections.index',compact('sections'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('sections.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Section::create($request->all());

        return redirect()->route('sections.index')
                        ->with('success','Section added successfully.');
    }
}
