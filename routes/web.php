<?php

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

Route::prefix('thesis')->namespace('Student')->group(function () {
    Route::GET('index', 'IssuesThesisController@index')->middleware(['auth'])->name('student-index');
    Route::get('search', 'IssuesThesisController@search')->name('thesis-search');
    Route::get('show/{name}-{id}', 'IssuesThesisController@show')->name('thesis-show');
    Route::post('form', 'IssuesThesisController@store')->middleware(['auth'])->name('thesis-form');
});

// Route::post('/login/store', [LoginController::Class, 'store']);
Auth::routes();

Route::get('laravel-send-email', 'EmailController@sendEMail');

Route::prefix('librarian')->namespace('Librarian')->middleware(['auth'])->group(function () {
    Route::GET('index', 'IssuesThesisController@index')->name('librarian-index');
    Route::POST('accept', 'IssuesThesisController@accept')->name('librarian-accept');
    Route::POST('decline', 'IssuesThesisController@decline')->name('librarian-decline');
    Route::POST('return', 'IssuesThesisController@return')->name('librarian-return');
});