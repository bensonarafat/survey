<?php

use App\Http\Controllers\SurveyController;
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

Route::post('/create', [SurveyController::class, "create"]);
Route::get('/get-survey', [SurveyController::class, "getSurvey"]);
Route::delete('/delete-survey/{id}', [SurveyController::class, "deleteSurvey"]);


Route::post('/store-question', [SurveyController::class, "storeQuestion"]);
Route::get('/get-questions/{id}', [SurveyController::class, "getQuestion"]);
