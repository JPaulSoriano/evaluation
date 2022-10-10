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
    return view('welcome');
});

Auth::routes();

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
    Route::get('evaluations', 'EvaluationController@index')->name('evaluations');
    //Evaulations
    Route::get('evaluations/{faculty}', 'EvaluationController@create')->name('evaluate');
    //Sections
    Route::resource('sections','SectionController');
});
