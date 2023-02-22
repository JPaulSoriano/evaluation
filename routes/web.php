<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function() {
    //Roles
    Route::resource('roles','RoleController');
    //Users
    Route::resource('users','UserController');
    //Categories
    Route::resource('categories','CategoryController');
    //Questions
    Route::resource('questions','QuestionController');
    Route::get('activate/{question}', 'QuestionController@activate')->name('activate');
    Route::delete('deactivate/{question}', 'QuestionController@deactivate')->name('deactivate');
    Route::post('questions/mass_action', 'QuestionController@massAction')->name('questions.mass_action');
    //Academic Year
    Route::resource('academicyears','AcademiCyearController');
    //Evaulations
    Route::get('evaluations', 'EvaluationController@index')->name('evaluations');
    Route::get('my-evaluations', 'EvaluationController@myevaluation')->name('myevaluations');
    Route::get('evaluations/{faculty}', 'EvaluationController@create')->name('evaluate');
    Route::post('evaluations/{faculty}/store','EvaluationController@store')->name('evaluatestore');
    Route::get('evaluations/{evaluation}/show', 'EvaluationController@show')->name('evaluateshow');
    //Sections
    Route::resource('sections','SectionController');
    //Subjects
    Route::resource('subjects','SubjectController');
    //Reports
    Route::get('reports', 'ReportController@index')->name('reports');
    Route::get('reports/{academicYear}/{faculty}/show', 'ReportController@show')->name('reportsshow');
    Route::get('/reports/subjects', 'ReportController@indexSubject')->name('reportssubjects');
    Route::get('reports/{academicYear}/{faculty}/showSubject', 'ReportController@showSubject')->name('reportsshowSubject');
    Route::get('/faculty-rankings', 'ReportController@facultyRankings')->name('ranking');




});
