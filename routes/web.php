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
    Route::resource('academicyears','AcademicYearController');
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
    Route::get('/ranking', 'ReportController@ranking')->name('faculties.ranking');
    Route::get('/faculties', 'ReportController@index')->name('faculties.index');
    Route::get('/faculties/{faculty}/report', 'ReportController@report')->name('faculties.report');
    Route::get('/faculties/{faculty}/reportQuarter', 'ReportController@reportQuarter')->name('faculties.reportQuarter');
    Route::get('/faculties/{faculty}/reportCategory', 'ReportController@reportCategory')->name('faculties.reportCategory');
    Route::get('/faculties/{faculty}/reportAcademicYear', 'ReportController@reportAcademicYear')->name('faculties.reportAcademicYear');
    Route::get('/faculties/{faculty}/reportSection', 'ReportController@reportSection')->name('faculties.reportSection');
    Route::get('/faculties/{faculty}/reportSubject', 'ReportController@reportSubject')->name('faculties.reportSubject');

});
