<?php

namespace App\Http\Controllers;

use App\AcademicYear;
use App\User;
use App\Section;
use App\Subject;
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




    public function indexSubject(Request $request)
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

            return redirect()->route('reportsshowSubject', ['faculty' => $faculty, 'academicYear' => $request->academicYear]);
        }

        return view('reports.indexSubject', compact('faculties'));
    }

    public function showSubject(Request $request, $academicYear, User $faculty)
    {
        $subjects = $faculty->facultyEvaluations->load('subject')->pluck('subject')->unique()->sortBy('name');

        $evaluations = $faculty->load([
            'facultyEvaluations' => function ($query) use ($request, $academicYear) {
                $query->when($request->get('section_id'), function ($query) use ($request) {
                    $query->where('section_id', $request->get('section_id'));
                })->when($request->get('subject_id'), function ($query) use ($request) {
                    $query->where('subject_id', $request->get('subject_id'));
                })->where('academic_year', $academicYear);
            },
        ])->facultyEvaluations;

        $selectedSection = "All Sections";
        if ($request->get('section_id')) {
            $selectedSection = Section::findOrFail($request->get('section_id'))->name;
        }

        $selectedSubject = "All Subjects";
        if ($request->get('subject_id')) {
            $selectedSubject = Subject::findOrFail($request->get('subject_id'))->name;
        }

        $categories = Category::with([
                'questions.evaluations' => function ($query) use ($request) {
                    $query->when($request->get('section_id'), function ($query) use ($request) {
                        $query->where('section_id', $request->get('section_id'));
                    })->when($request->get('subject_id'), function ($query) use ($request) {
                        $query->where('subject_id', $request->get('subject_id'));
                    });
                },
                'questions' => function ($query) {
                    $query->where('status', 1);
                }
            ])->get();

        $categories = $categories->map(function ($category) {

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

        return view('reports.showSubject', compact(
            'evaluations',
            'faculty',
            'subjects',
            'selectedSection',
            'selectedSubject',
            'categories',
            'academicYear'
        ));
    }


    public function facultyRankings()
    {
        $faculty = User::role('Faculty')->get();
        $ranked_faculty = $faculty->map(function ($f) {
            $evaluations = Evaluation::where('faculty_id', $f->id)->with('questions')->get();
            $overall_score = 0;
            $total_weight = 0;
            foreach ($evaluations as $e) {
                $weight = $e->questions->sum('pivot.rate');
                $total_weight += $weight;
                $overall_score += $weight * $e->questions->avg('pivot.rate');
            }
            $overall_score /= $total_weight;
            return ['faculty' => $f, 'overall_score' => $overall_score];
        })->sortByDesc('overall_score');
        
        return view('reports.ranking', ['ranked_faculty' => $ranked_faculty]);
    }

}
