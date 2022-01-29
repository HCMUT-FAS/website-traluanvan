<?php

use App\Http\Controllers\Apis\AuthController;
use App\Http\Controllers\Apis\ThesisController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login']);

Route::post('/token/create', [AuthController::class, 'create']);

Route::post('/form/store', [ThesisController::class, 'store']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/data', [ThesisController::class, 'index']);    
});
