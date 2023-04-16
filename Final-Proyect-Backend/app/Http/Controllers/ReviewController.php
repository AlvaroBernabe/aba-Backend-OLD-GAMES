<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function newReview(Request $request)
    {
        try {
            // Log::info("New Messages Working");
            $validator = Validator::make($request->all(), [
                'player_score' => 'numeric',
                'player_review' => 'string',
                'favourite' => 'boolean',
                'game_id' => 'integer',
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
            $userId = auth()->user()->id;
            $player_score = $request->input('player_score');
            $player_review = $request->input('player_review');
            $favourite = $request->input('favourite');
            $game_id = $request->input('game_id');
            $newReview = Review::where('user_id', $userId)->where('game_id', $game_id)->first();
            if (is_null($newReview)) {
                $newReview = new Review([
                    'player_score' => $player_score,
                    'player_review' => $player_review,
                    'favourite' => $favourite,
                    'game_id' => $game_id,
                    'user_id' => $userId
                ]);
                $newReview->save();
                return response()->json(
                    [
                        "success" => true,
                        "message" => "Review created successfully",
                        "data" => $newReview
                    ],
                    200
                );
            } else {
                $newReview->player_score = $player_score;
                $newReview->player_review = $player_review;
                $newReview->favourite = $favourite;
                $newReview->game_id = $game_id;
                $newReview->user_id = $userId;
                $newReview->save();
                return response()->json(
                    [
                        "success" => true,
                        "message" => "Review Updated",
                        "data" => $newReview
                    ],
                    200
                );
            }
        } catch (\Throwable $th) {
            Log::error("New Review Error: " . $th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => $th->getMessage()
                ],
                500
            );
        }
    }

    public function getMyReviews()
    {
        // Log::info("Get User Reviews Working");
        try {
            $id = auth()->user()->id;
            // $reviews = Review::query()->where('user_id', '=', $id)->get();
            $reviews = DB::table('reviews')->where('user_id', $id)->get();
            $gameId = $reviews->pluck( 'game_id' );
            // $game_id = $reviews[0]->game_id;
            // $gameName = DB::table('games')->where('id', '=', $id)->get();
            // $game_id = Review::with('reviews.games')->whereRelation('game_id','id')->first();
            $gameFind = Game::query()->whereIn('id', $reviews->pluck('game_id'))->get('name');
            $gameName = $gameFind[0]->name;
            foreach ($gameFind as $data){
                // $gameId = $reviews->game_id;
                return [
                    "success" => true,
                    "message" => "These are all the news",
                    "data" => [              
                                    'Title of Game' => $gameFind,
                                    'Message' =>  $reviews

                        // 'id' => $reviews->id,
                        // 'player_score' => $reviews->player_score,
                        // 'player_review' => $reviews->player_review,
                        // 'favourite' => $reviews->favourite,
                        // 'game_id' => $reviews->game_id,
                        // 'title' => $gameFind->name
                        
                    ]
                ];
            }
            return response()->json(
                [
                    "success" => true,
                    "message" => "Estos son todas tus reviews",
                    "data" => $reviews
                ],
                200
            );
            // $reviews = DB::table('reviews')->where('user_id', '=', $id)->first();
            // $reviewsId = Review::query()->where('user_id', '=', $id)->first();
            // $gameId = $reviewsId->game_id;
            // $gameData = Game::query()->find($gameId);
            // $gameTitle = $gameData->title;
            // return response()->json(
            //     [
            //         "success" => true,
            //         "message" => "Message of Games Id",
            //         "data" => [
            //             'Title of Game' => $gameTitle,
            //             'Message' =>  $reviewsId
            //         ]
            //     ],
            //     200
            // );
            // $user = Game::find($userId);
            // $gameName = $user->party()->wherePivot('user_id', $userId)->get();
            // $game_id->category->name; // get category name
            // $game_id->category->user->name; // get user name
        } catch (\Throwable $th) {
            Log::error("Get User Reviews Error: " . $th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => $th->getMessage() .$gameFind
                ],
                500
            );
        }
    }

    public function getMyLessFavourites()
    {
        // Log::info("Get User Reviews Working");
        try {
            $id = auth()->user()->id;
            $message = DB::table('reviews')->where('user_id', '=', $id)->where('favourite', '=', 0)->get();
            return response()->json(
                [
                    "success" => true,
                    "message" => "Estos son todas tus reviews",
                    "data" => $message
                ],
                200
            );
        } catch (\Throwable $th) {
            Log::error("Get User Reviews Error: " . $th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => $th->getMessage()
                ],
                500
            );
        }
    }

    public function getMyFavourites()
    {
        // Log::info("Get User Reviews Working");
        try {
            $id = auth()->user()->id;
            $message = DB::table('reviews')->where('user_id', '=', $id)->where('favourite', '=', 1)->get();
            return response()->json(
                [
                    "success" => true,
                    "message" => "Estos son todas tus reviews",
                    "data" => $message
                ],
                200
            );
        } catch (\Throwable $th) {
            Log::error("Get User Reviews Error: " . $th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => $th->getMessage()
                ],
                500
            );
        }
    }

}
