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

use App\Http\Controllers\Users\Guest\GuestController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\Student\IssuesThesisController as student;
use App\Http\Controllers\Users\Librarian\IssuesThesisController as librarian;
use App\Http\Controllers\Users\ProfileController;
use App\Mail\IssuesSuccess;
use Illuminate\Support\Facades\Mail;


Route::GET('/', function () {
	return view('welcome');
});

Route::GET('/about', function () {
	return view('about');
})->name('about');

Route::GET('/email', function () {
	Mail::to('banhbeovodung01@gmail.com')->send(new IssuesSuccess());
})->name('email');

// Route::post('/login/store', [LoginController::Class, 'store']);
Auth::routes();

Route::prefix('user')->middleware(['auth'])->group(function () {
	Route::prefix('student')->group(function () {
		Route::GET('index', [student::class, 'index'])->name('student.index');
		Route::POST('form', [student::class, 'store'])->name('student.store');
	});

	Route::prefix('librarian')->group(function () {
		Route::GET('index', [librarian::class, 'index'])->name('librarian.index');
		Route::POST('accept', [librarian::class, 'accept'])->name('librarian.accept');
		Route::POST('destroy', [librarian::class, 'destroy'])->name('librarian.destroy');
		Route::POST('return', [librarian::class, 'return'])->name('librarian.return');
	});

	Route::GET('index', [ProfileController::class, 'index'])->name('user.index');
	Route::POST('update', [ProfileController::class, 'update'])->name('user.update');
});

Route::prefix('guest')->group(function () {
	Route::GET('search', [GuestController::class, 'index'])->name('thesis.search');
	Route::GET('search/api/index', [GuestController::class, 'apiIndex'])->name('thesis.index');
	Route::GET('show/{name}-{id}', [GuestController::class, 'show'])->name('thesis.show');
});