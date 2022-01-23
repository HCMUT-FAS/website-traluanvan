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

use App\Jobs\Accept;
use App\Jobs\LibrarianAccept;
use App\Jobs\Success;
use App\Mail\IssuesSuccess;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


Route::GET('/', function () {
    return view('welcome');
});

Route::GET('/about', function () {
    return view('about');
})->name('about');

Route::GET('/email', function () {
    // Mail::to('banhbeovodung01@gmail.com')->send(new IssuesSuccess());
    $email = 'test01@gmail.com';
    LibrarianAccept::dispatch($email);

    // Show IssuesSuccess.blade.php
    // return new IssuesSuccess();
});

Route::prefix('user')->namespace('Users')->group(function (){
    Route::prefix('student')->namespace('Student')->group(function () {
        Route::GET('index', 'IssuesThesisController@index')->middleware(['auth'])->name('student-index');
        Route::POST('form', 'IssuesThesisController@store')->middleware(['auth'])->name('thesis-form');
        Route::GET('search', 'IssuesThesisController@search')->name('thesis-search');
        Route::GET('show/{name}-{id}', 'IssuesThesisController@show')->name('thesis-show');
    });

    Route::prefix('librarian')->namespace('Librarian')->middleware(['auth'])->group(function () {
        Route::GET('index', 'IssuesThesisController@index')->name('librarian-index');
        Route::POST('accept', 'IssuesThesisController@accept')->name('librarian-accept');
        Route::POST('decline', 'IssuesThesisController@decline')->name('librarian-decline');
        Route::POST('return', 'IssuesThesisController@return')->name('librarian-return');
    });

    Route::prefix('profile')->group(function () {
        Route::GET('index', 'ProfileController@index')->middleware(['auth'])->name('profile-index');
        Route::POST('update', 'ProfileController@update')->middleware(['auth'])->name('profile-update');
    });
});

// Route::post('/login/store', [LoginController::Class, 'store']);
Auth::routes();