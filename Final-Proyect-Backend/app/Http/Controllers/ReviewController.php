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
    public function newReviewAndUpdate(Request $request)
    {
        try {
            Log::info("New Review Working");

            $validator = Validator::make($request->all(), [
                'player_score' => 'numeric',
                'player_review' => 'string|max:250',
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
        try {
            Log::info("Get My Reviews Working");

            $id = auth()->user()->id;
            $reviews = DB::table('reviews')->where('user_id', $id)->get();
            $gameIds = $reviews->pluck('game_id');
            $games = Game::query()->whereIn('id', $gameIds)->get(['name', 'id', 'game_image', 'score']);

            $reviews = $reviews->map(function ($review) use ($games) {
                $game = $games->where('id', $review->game_id)->first();
                $review->game_image = $game->game_image;
                $review->game_score = $game->score;
                $review->game_title = $game->name;
                return $review;
            });

            return [
                "success" => true,
                "message" => "These are all your reviews",
                "data" => [
                    'Reviews' => $reviews,
                ]
            ];
        } catch (\Throwable $th) {
            Log::error("Get My Reviews Error: " . $th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => $th->getMessage()
                ],
                500
            );
        }
    }

    public function getMyLessFavourites()
    {
        try {
            Log::info("Get Less Favourites Reviews Working");
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
            Log::error("Get Less Favourites Reviews Error: " . $th->getMessage());

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
        try {
            Log::info("Get Favourites Reviews Working");
            $id = auth()->user()->id;
            $reviews = DB::table('reviews')->where('user_id', '=', $id)->where('favourite', '=', 1)->get();

            $gameIds = $reviews->pluck('game_id');
            $games = Game::query()->whereIn('id', $gameIds)->get(['name', 'id', 'game_image', 'score']);

            $reviews = $reviews->map(function ($review) use ($games) {
                $game = $games->where('id', $review->game_id)->first();
                $review->game_image = $game->game_image;
                $review->game_score = $game->score;
                $review->game_title = $game->name;
                return $review;
            });

            return response()->json(
                [
                    "success" => true,
                    "message" => "Estos son tus reviews Favoritas",
                    "data" => $reviews
                ],
                200
            );
        } catch (\Throwable $th) {
            Log::error("Get Favourites Reviews Error: " . $th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => $th->getMessage()
                ],
                500
            );
        }
    }

    public function deleteReviewUser($id)
    {
        try {
            Log::info("Deleted User Reviews Working");
            $review = DB::table('reviews')->where('id', $id)->first();

            $user_id = auth()->user()->id;
            if ($review->user_id != $user_id) {
                return response()->json([
                    "success" => false,
                    "message" => "You are not authorized to delete this review"
                ], 403);
            }

            DB::table('reviews')->where('id', $id)->delete();

            return response()->json(
                [
                    "success" => true,
                    "message" => "Review removed",
                    "data" => $review
                ],
                200
            );
        } catch (\Throwable $th) {
            Log::error("Deleted User Reviews Error: " . $th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => $th->getMessage()
                ],
                500
            );
        }
    }


    public function deleteReviewsByID_Admin($id)
    {
        try {
            Log::info("Deleted User Reviews By Admin Working");
            $reviews = DB::table('reviews')->where('id', $id)->delete();

            return response()->json(
                [
                    "success" => true,
                    "message" => "Review Removed",
                    "data" => $reviews
                ],
                200
            );
        } catch (\Throwable $th) {
            Log::error("Deleted User Reviews By Admin Error: " . $th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => $th->getMessage()
                ],
                500
            );
        }
    }

    public function getAllReviews()
    {
        try {
            Log::info("Get All Reviews Working");
            $news = Review::where('game_id', '!=', 0)->get();

            foreach ($news as $data) {
                $gameId = $data->game_id;
                $gameFind = Game::where('id', '=', $gameId)->first();
                $gameName = $gameFind->name;
                $result[] = [
                    "game_name" => $gameName,
                    "Reviews" => $data
                ];
            }

            return [
                "success" => true,
                "message" => "These are all the Reviews",
                "data" => $result
            ];
        } catch (\Throwable $th) {
            Log::error("Get All Reviews Error: " . $th->getMessage());

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
