<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

// AuthController
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

// User Controller
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/profile', [UserController::class, 'myProfile']);
    Route::put('/profile/update', [UserController::class, 'updateProfile']);
});

Route::group(['middleware' => ['auth:sanctum', 'isAdmin']], function () {
    Route::get('/users/all', [UserController::class, 'getAllUsers']);
    Route::get('/users/all/details/{id}', [UserController::class, 'getUserDetailsByUserId']);
    Route::delete('/users/all/destroy/{id}', [UserController::class, 'deleteUserById']);
});

//Role Controller
Route::middleware('auth:sanctum', 'isAdmin')->put('/user/role/update', [RoleController::class, 'changeUserToAdmin']);
