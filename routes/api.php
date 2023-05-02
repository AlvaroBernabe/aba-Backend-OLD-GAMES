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


Route::get('/', function () {
    return view('welcome');
});

// AuthController
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->put('/updatelogin', [AuthController::class, 'changeLogin']);


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

//Game Controller
Route::group(['middleware' => ['auth:sanctum', 'isAdmin']], function () {
    Route::post('/game/new', [GameController::class, 'newGame']);
    Route::put('/game/update/{id}', [GameController::class, 'updateGameId']);
    Route::delete('/game/{id}', [GameController::class, 'deleteGameByIdAdmin']);
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/games/all/user', [GameController::class, 'getAllGamesWithoutReviewUser']);
    Route::post('/games/find/', [GameController::class, 'findGamesFilter']);
    Route::get('/games/all/{id}', [GameController::class, 'getGameById']);
    Route::get('/games/all/', [GameController::class, 'getAllGames']);
});

Route::get('/games/alls/nonuser', [GameController::class, 'getAllGamesNotUser']);

//Review Controller
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/review/new', [ReviewController::class, 'newReviewAndUpdate']);
    Route::get('/review/myreviews', [ReviewController::class, 'getMyReviews']);
    Route::get('/review/favourites/not', [ReviewController::class, 'getMyLessFavourites']);
    Route::get('/review/favourites', [ReviewController::class, 'getMyFavourites']);
    Route::delete('/review/{id}', [ReviewController::class, 'deleteReviewUser']);
});

Route::middleware('auth:sanctum', 'isAdmin')->delete('/review/all/{id}', [ReviewController::class, 'deleteReviewsByID_Admin']);
Route::middleware('auth:sanctum', 'isAdmin')->get('/reviews/all', [ReviewController::class, 'getAllReviews']);

//News Controller
Route::group(['middleware' => ['auth:sanctum', 'isAdmin']], function () {
    Route::post('/news/new', [NewsController::class, 'newNews']);
    Route::put('/news/update/{id}', [NewsController::class, 'updateNewsId']);
    Route::delete('/news/all/destroy/{id}', [NewsController::class, 'deleteNewsByIdAdmin']);
});

Route::get('/news/all/', [NewsController::class, 'getAllNews']);
