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
    return view('welcome', [
        'tittle' => "Traluanvan"
    ]);
});

Route::get('/search', [
    'as' => 'search',
    'uses' => 'LuanvanController@search'
]);

Route::resource('/form', 'FormController');

// Route::post('/login/store', [LoginController::Class, 'store']);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
