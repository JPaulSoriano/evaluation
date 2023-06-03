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

}
