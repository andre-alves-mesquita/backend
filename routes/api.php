<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
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

Route::post('/user-login', [AuthController::class, 'login']);
Route::get('/user-logout', [AuthController::class, 'logout'])->middleware('auth:api');
Route::post('/user-register', [UserController::class, 'register']);
Route::post('/upload', [UploadController::class, 'upload'])->middleware('auth:api');
