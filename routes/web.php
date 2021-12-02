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

Route::get('/luanvan/search', [
    'as' => 'search',
    'uses' => 'LuanvanController@search',
]);

Route::get('/luanvan/show/{name}-{id}', [
    'uses' => 'LuanvanController@show'
])->name('luanvan-show');

Route::post('/luanvan/form', [
    'uses' => 'FormController@store'
])->name('luanvan-form');

// Route::post('/login/store', [LoginController::Class, 'store']);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
