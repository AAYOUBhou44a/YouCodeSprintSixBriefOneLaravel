<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\QuestionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/questions', [QuestionController::class, 'getQuestions']);

Route::middleware('auth:sanctum')->get('/login', function(){
    return response()->json();
});

Route::middleware('auth:sanctum')->get('/profile', [ProfileController::class, 'profile']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/register', [AuthController::class, 'submitRegister']);
Route::get('/favorites', [FavoriteController::class, 'getFavorites'])->middleware('auth:sanctum');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth:sanctum');
Route::get('/questions/{id}', [QuestionController::class, 'showQuestion'])->middleware('auth:sanctum');