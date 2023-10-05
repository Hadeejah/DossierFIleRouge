<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\SessionDeCoursController;
use App\Http\Controllers\UserController;
use App\Models\SessionDeCours;
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
// User
Route::post('/user',[AuthController::class,'store']);
Route::post('/user',[AuthController::class,'login']);
Route::get('/user',[AuthController::class,'logout']);



// Cours
Route::post('/cours',[CoursController::class,'store']);
Route::get('/cours',[CoursController::class,'index']);

Route::post('/salle',[SalleController::class,'store']);

Route::get('/module',[ModuleController::class,'index']);
Route::get('/user/{id}',[UserController::class,'getProfByModule']);
Route::get('/classe',[ClasseController::class,'index']);
Route::post('/session',[SessionDeCoursController::class,'store']);


