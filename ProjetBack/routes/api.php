<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\SalleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/user',[AuthController::class,'store']);

Route::post('/cours',[CoursController::class,'store']);

Route::post('/salle',[SalleController::class,'store']);
