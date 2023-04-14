<?php

namespace App\Http\Controllers;

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
            $message = DB::table('reviews')->where('user_id', '=', $id)->get();
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
