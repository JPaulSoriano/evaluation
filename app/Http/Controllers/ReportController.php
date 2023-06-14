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
         $this->middleware('permission:admin|head faculty');
    }

    public function index()
    {
        $currentAcademicYear = AcademicYear::latest()->first()->name;
        $faculties = User::role('Faculty')->get();
        return view('reports.index', compact('faculties', 'currentAcademicYear'));
    }

    public function report(User $faculty, Request $request)
    {
        $currentAcademicYear = AcademicYear::latest()->first()->name; //Remove this if you want All Time
        $quarter = $request->input('quarter');
        $questions = $faculty->facultyEvaluations()
            ->where('academic_year', $currentAcademicYear)
            ->when($quarter, function ($query) use ($quarter) {
                return $query->where('quarter', $quarter);
            })
            ->with('questions')
            ->get()
            ->flatMap(function ($evaluation) {
                return $evaluation->questions;
            });

        $averageRates = $questions->groupBy('id')->map(function ($question) {
            $total = $question->pluck('pivot.rate')->sum();
            $count = $question->pluck('pivot.rate')->count();

            return [
                'question' => $question->first()->question,
                'average_rate' => $count > 0 ? $total / $count : 0,
            ];
        });

        return view('reports.report', compact('faculty', 'averageRates', 'currentAcademicYear'));
    }




    public function reportQuarter(User $faculty)
    {
        $currentAcademicYear = AcademicYear::latest()->first()->name; //Remove this if you want All Time
        $quarters = ['1st', '2nd', '3rd', '4th'];
    
        $averageRates = [];
    
        foreach ($quarters as $quarter) {
            $questions = $faculty->facultyEvaluations()
                ->where('academic_year', $currentAcademicYear)
                ->where('quarter', $quarter)
                ->with('questions')
                ->get()
                ->flatMap(function ($evaluation) {
                    return $evaluation->questions;
                });
    
            $average = $questions->groupBy('id')->map(function ($question) {
                $total = $question->pluck('pivot.rate')->sum();
                $count = $question->pluck('pivot.rate')->count();
    
                return $count > 0 ? $total / $count : 0;
            })->avg();
    
            $averageRates[$quarter] = $average;
        }
    
        return view('reports.reportQuarter', compact('faculty', 'averageRates', 'currentAcademicYear'));
    }
    
    public function reportCategory(User $faculty, Request $request)
    {
        $currentAcademicYear = AcademicYear::latest()->first()->name; //Remove this if you want All Time
        $quarter = $request->input('quarter');
        $evaluations = $faculty->facultyEvaluations()
            ->where('academic_year', $currentAcademicYear)
            ->when($quarter, function ($query) use ($quarter) {
                return $query->where('quarter', $quarter);
            })
            ->with('questions.category')->get();
    
        $categoryAverages = $evaluations->flatMap(function ($evaluation) {
            return $evaluation->questions->map(function ($question) use ($evaluation) {
                return [
                    'category' => $question->category->name,
                    'rate' => $question->pivot->rate,
                ];
            });
        })->groupBy('category')->map(function ($questions) {
            $total = $questions->pluck('rate')->sum();
            $count = $questions->count();
    
            return [
                'category' => $questions->first()['category'],
                'average_rate' => $count > 0 ? $total / $count : 0,
            ];
        });
    
        return view('reports.reportCategory', compact('faculty', 'categoryAverages', 'currentAcademicYear'));
    }


    public function reportAcademicYear(User $faculty)
    {
        $academicYears = Evaluation::distinct('academic_year')->pluck('academic_year');

        $averageRates = [];

        foreach ($academicYears as $academicYear) {
            $questions = $faculty->facultyEvaluations()
                ->where('academic_year', $academicYear)
                ->with('questions')
                ->get()
                ->flatMap(function ($evaluation) {
                    return $evaluation->questions;
                });

            $average = $questions->groupBy('id')->map(function ($question) {
                $total = $question->pluck('pivot.rate')->sum();
                $count = $question->pluck('pivot.rate')->count();

                return $count > 0 ? $total / $count : 0;
            })->avg();

            $averageRates[$academicYear] = $average;
        }

        return view('reports.reportAcademicYear', compact('faculty', 'averageRates'));
    }

    public function reportSection(User $faculty, Request $request)
    {
        $currentAcademicYear = AcademicYear::latest()->first()->name; //Remove this if you want All Time
        $quarter = $request->input('quarter');
        $sections = $faculty->facultyEvaluations()
            ->where('academic_year', $currentAcademicYear)
            ->when($quarter, function ($query) use ($quarter) {
                return $query->where('quarter', $quarter);
            })
            ->with('section', 'questions')
            ->get()
            ->groupBy('section_id');

        $sectionAverages = [];

        foreach ($sections as $sectionId => $evaluations) {
            $section = Section::find($sectionId);
            $questions = $evaluations->flatMap(function ($evaluation) {
                return $evaluation->questions;
            });

            $sectionAverageRate = $questions->pluck('pivot.rate')->avg();

            $sectionAverages[] = [
                'section' => $section,
                'average_rate' => $sectionAverageRate,
            ];
        }

        return view('reports.reportSection', compact('faculty', 'sectionAverages', 'currentAcademicYear'));
    }

    public function reportSubject(User $faculty, Request $request)
    {
        $currentAcademicYear = AcademicYear::latest()->first()->name; //Remove this if you want All Time
        $quarter = $request->input('quarter');
        $subjects = $faculty->facultyEvaluations()
            ->where('academic_year', $currentAcademicYear)
            ->when($quarter, function ($query) use ($quarter) {
                return $query->where('quarter', $quarter);
            })
            ->with('subject', 'questions')
            ->get()
            ->groupBy('subject_id');
    
        $subjectAverages = [];
    
        foreach ($subjects as $subjectId => $evaluations) {
            $subject = Subject::find($subjectId);
            $questions = $evaluations->flatMap(function ($evaluation) {
                return $evaluation->questions;
            });
    
            $averageRate = $questions->pluck('pivot.rate')->avg();
    
            $subjectAverages[] = [
                'subject' => $subject,
                'averageRate' => $averageRate,
            ];
        }
    
        return view('reports.reportSubject', compact('faculty', 'subjectAverages', 'currentAcademicYear'));
    }
    

    public function ranking(Request $request)
    {
        $currentAcademicYear = AcademicYear::latest()->first()->name; // Remove this if you want All Time
        $quarter = $request->input('quarter');

        $faculties = User::role('Faculty')->get();
        $facultyRankings = [];

        foreach ($faculties as $faculty) {
            $questions = $faculty->facultyEvaluations()
                ->where('academic_year', $currentAcademicYear)
                ->when($quarter, function ($query) use ($quarter) {
                    return $query->where('quarter', $quarter);
                })
                ->with('questions')
                ->get()
                ->flatMap(function ($evaluation) {
                    return $evaluation->questions;
                });

            $averageRate = $questions->pluck('pivot.rate')->avg();

            $facultyRankings[] = [
                'faculty' => $faculty,
                'averageRate' => $averageRate,
            ];
        }

        // Sort the faculty rankings based on the average rate in descending order
        usort($facultyRankings, function ($a, $b) {
            return $b['averageRate'] <=> $a['averageRate'];
        });

        return view('reports.ranking', compact('facultyRankings'));
    }

    

}
