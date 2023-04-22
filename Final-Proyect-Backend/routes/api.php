<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Review;
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
Route::middleware('verifyToken')->post('/logout', [AuthController::class, 'logout']);
Route::middleware('verifyToken')->put('/updatelogin', [AuthController::class, 'changeLogin']);


// User Controller
Route::group(['middleware' => 'verifyToken'], function () {
    Route::get('/profile', [UserController::class, 'myProfile']);
    Route::put('/profile/update', [UserController::class, 'updateProfile']);
});

Route::group(['middleware' => ['verifyToken','isAdmin']], function () {
    Route::get('/users/all', [UserController::class, 'getAllUsers']);
    Route::get('/users/all/details/{id}', [UserController::class, 'getUserDetailsByUserId']);
    Route::delete('/users/all/destroy/{id}', [UserController::class, 'deleteUserById']);
});

//Role Controller
Route::middleware('verifyToken', 'isAdmin')->put('/user/role/update', [RoleController::class, 'changeUserToAdmin']);

//Game Controller
Route::middleware('verifyToken', 'isAdmin')->post('/game/new', [GameController::class, 'newGame']);
Route::middleware('verifyToken', 'isAdmin')->put('/game/update/{id}', [GameController::class, 'updateGameId']);
Route::middleware('verifyToken')->get('/games/all/', [GameController::class, 'getAllGames']);
Route::middleware('verifyToken')->post('/games/find/', [GameController::class, 'findGamesFilter']);
Route::middleware('verifyToken')->get('/games/all/{id}', [GameController::class, 'getGameById']);
Route::middleware('verifyToken', 'isAdmin')->delete('/game/{id}', [GameController::class, 'deleteGameByIdAdmin']);

//Review Controller
Route::group(['middleware' => 'verifyToken'], function () {
    Route::post('/review/new', [ReviewController::class, 'newReview']);
    Route::get('/review/myreviews', [ReviewController::class, 'getMyReviews']);
    Route::get('/review/favourites/not', [ReviewController::class, 'getMyLessFavourites']);
    Route::get('/review/favourites', [ReviewController::class, 'getMyFavourites']);
    Route::delete('/review/{id}', [ReviewController::class, 'deleteReviewAdmin']);
    Route::delete('/review/all/{id}', [ReviewController::class, 'deleteReviewsByUserID_Admin']);
});
Route::middleware('verifyToken', 'isAdmin')->get('/reviews/all', [ReviewController::class, 'getAllReviews']);

//News Controller
Route::group(['middleware' => ['verifyToken', 'isAdmin']], function () {
    Route::post('/news/new', [NewsController::class, 'newNews']);
    Route::put('/news/update/{id}', [NewsController::class, 'updateNewsId']);
    Route::delete('/news/all/destroy/{id}', [NewsController::class, 'deleteNewsByIdAdmin']);

});
Route::middleware('verifyToken')->get('/news/all/', [NewsController::class, 'getAllNews']);
