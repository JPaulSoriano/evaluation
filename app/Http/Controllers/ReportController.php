<?php

namespace App\Http\Controllers;

use App\AcademicYear;
use App\User;
use App\Section;
use App\Category;
use App\Evaluation;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:admin');
    }

    public function index(Request $request)
    {
        $faculties = User::role('Faculty')->get();

        $faculty = '';
        if($request->get('faculty_id'))
        {
            $request->validate([
                'faculty_id' => 'exists:evaluations,faculty_id',
                'academicYear' => 'exists:evaluations,academic_year',
            ], [
                'faculty_id.exists' => 'Faculty has not yet evaluated',
                'academicYear.exists' => 'There are no reports on the selected academic year',
            ]);

            // $evaluations = Evaluation::latest()->paginate(5);
            $faculty = User::find($request->get('faculty_id'));
            // if(!$faculty->has('facultyEvaluations'))
            // {
            //     return back()->withErrors(['faculty' => 'Faculty has not yet evaluated']);
            // }

            return redirect()->route('reportsshow', ['faculty' => $faculty, 'academicYear' => $request->academicYear]);
        }

        return view('reports.index', compact('faculties'));
    }

    public function show(Request $request, $academicYear, User $faculty)
    {
        $sections = $faculty->facultyEvaluations->load('section')->pluck('section')->unique()->sortBy('name');

        $evaluations = $faculty->load([
            'facultyEvaluations' => function ($query) use ($request, $academicYear) {
                $query->when($request->get('section_id'), function ($query) use ($request) {
                    $query->where('section_id', $request->get('section_id'));
                })->where('academic_year', $academicYear);
            },
        ])->facultyEvaluations;

        $selectedSection = "All Section";
        if($request->get('section_id'))
        {
            $selectedSection = Section::findOrFail($request->get('section_id'));
        }

        $categories = Category::with([
                'questions.evaluations' => function ($query) use ($request) {
                    $query->when($request->get('section_id'), function ($query) use ($request) {
                        $query->where('section_id', $request->get('section_id'));
                    });
                },
                'questions' => function ($query) {
                    $query->where('status', 1);
                }
            ])->get();

        $categories = $categories->map(function ($category) {

            // $rateCollection = $category->questions->map->evaluations->flatten()->pluck('pivot')->groupBy('question_id')->map->countBy('rate');
            // $category['sum'] = $rateCollection;
            $category->questions->transform(function ($question) {
                $rateCollection = $question->evaluations->pluck('pivot')->groupBy('question_id')->map->countBy('rate');

                $weightedMean = $rateCollection->map(function ($rates)  {
                    return $rates->map(function ($rate, $key) {
                        return $rate * $key;
                    })->sum() / $rates->sum();
                })->values();

                $question['mean'] = number_format($weightedMean->first(), 1);
                return $question;
            });

            return $category;
        });

        return view('reports.show', compact(
            'evaluations',
            'faculty',
            'sections',
            'selectedSection',
            'categories',
            'academicYear'
        ));
    }

}
