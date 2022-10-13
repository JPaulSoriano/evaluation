<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use Exception;
use App\Section;
use App\Category;
use App\Question;
use App\Evaluation;
use App\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:student');
    }

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
        // dd($request->all());

        $request->validate([
            'section_id' => 'required',
            'rates' => 'required|array',
            'rates.*' => 'required|integer',
        ]);

        try
        {
            DB::beginTransaction();

            $input = $request->all();
            $input['faculty_id'] = $faculty->id;
            $input['academic_year'] = AcademicYear::latest()->first()->name;

            $rates = collect($request->rates)->map(function ($value, $key) {
                return ['rate' => $value ];
            })->toArray();

            $evaluation = Auth::user()->evaluations()->create($input);

            $evaluation->questions()->sync($rates);

            DB::commit();

        }
        catch(Exception $e)
        {
            DB::rollBack();
            return back()->withErrors(['error' => 'Contact Administrator']);
        }


        return redirect()->route('evaluations')->with('success','Success!');
    }

    public function show(Evaluation $evaluation)
    {
        $categories = $evaluation->questions->loadMissing(['category'])->mapToGroups(function ($value, $key) {
            return [$value['category']['name'] => $value];
        });

        return view('evaluations.show', compact('evaluation', 'categories'));
    }
}
