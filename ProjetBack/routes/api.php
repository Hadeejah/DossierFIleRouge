<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ModuleProfController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\SessionDeCoursController;
use App\Http\Controllers\UserController;
use App\Models\Module;
use App\Models\ModuleProf;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/user', [AuthController::class, 'store']);
    Route::post('/logout', [AuthController::class, 'logout']);

    /* /Cours */
    // Route::post('/cours', [CoursController::class, 'store']);
    // Route::get('/cours', [CoursController::class, 'index']);

    /* /Salle */
    Route::post('/salle', [SalleController::class, 'store']);
    Route::get('/salle', [SalleController::class, 'index']);

    /* /Module */
    Route::get('/module', [ModuleController::class, 'index']);

    /* /User */
    // Route::get('/user/{id}', [UserController::class, 'getProfByModule']);
    Route::post('/import', [UserController::class, 'import']);
    Route::get('/inscription', [UserController::class, 'index']);

    /* /Session */
    Route::post('/session', [SessionDeCoursController::class, 'store']);
    // Route::get('/session', [SessionDeCoursController::class, 'index']);

    /* /Classe */
    Route::get('/classe', [ClasseController::class, 'index']);

    /* /Demande */
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/demande', [DemandeController::class, 'store']);

Route::get('/demande', [DemandeController::class, 'index']);
Route::post('/cours', [CoursController::class, 'store']);

Route::get('/modProf/{idProf}', [ModuleProfController::class, 'getProfByModule']);
Route::get('/cours', [CoursController::class, 'index']);

    Route::get('/session', [SessionDeCoursController::class, 'index']);
    Route::post('/session', [SessionDeCoursController::class, 'store']);
    Route::get('/module', [ModuleController::class, 'index']);
    Route::get('/user/{id}', [UserController::class, 'getProfByModule']);

// Route::get('/modProf', [ModuleProfController::class, 'index']);
