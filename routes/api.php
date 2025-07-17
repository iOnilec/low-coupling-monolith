<?php

use App\Http\Controllers\JobsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UsersController::class, 'index']);
Route::post('/users', [UsersController::class, 'store']);
Route::get('/users/{users_id}', [UsersController::class, 'show']);
Route::put('/users/{users_id}', [UsersController::class, 'update']);
Route::delete('users/{users_id}', [UsersController::class, 'destroy']);

Route::get('/jobs', [JobsController::class, 'index']);
Route::post('/jobs', [JobsController::class, 'store']);
Route::get('/jobs/{jobs_id}', [JobsController::class, 'show']);
Route::put('/jobs/{jobs_id}', [JobsController::class, 'update']);
Route::delete('jobs/{jobs_id}', [JobsController::class, 'destroy']);