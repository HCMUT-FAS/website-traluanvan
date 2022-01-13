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

use App\Mail\IssuesAccept;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::GET('/', function () {
    return view('welcome');
});

Route::GET('/about', function () {
    return view('about');
})->name('about');

/**
 * Guest Route
 * Features:
 * - search for theses
 * - show all information of each thesis
 * 
 * Student Route
 * Features:
 * - index page (will show statics for a user)
 * - search for theses
 * - show all information of each thesis
 */
Route::prefix('thesis')->namespace('Student')->group(function () {
    Route::GET('index', 'IssuesThesisController@index')->middleware(['auth'])->name('student-index');
    Route::POST('form', 'IssuesThesisController@store')->middleware(['auth'])->name('thesis-form');
    Route::GET('search', 'IssuesThesisController@search')->name('thesis-search');
    Route::GET('show/{name}-{id}', 'IssuesThesisController@show')->name('thesis-show');
});

// Route::post('/login/store', [LoginController::Class, 'store']);
Auth::routes();

/**
 * Librarian Route
 * Features:
 * - index page (for statistics) not working yet
 * - accept, decline & return form.
 * - block user
 */
Route::prefix('librarian')->namespace('Librarian')->middleware(['auth'])->group(function () {
    Route::GET('index', 'IssuesThesisController@index')->name('librarian-index');
    Route::POST('accept', 'IssuesThesisController@accept')->name('librarian-accept');
    Route::POST('decline', 'IssuesThesisController@decline')->name('librarian-decline');
    Route::POST('return', 'IssuesThesisController@return')->name('librarian-return');
});