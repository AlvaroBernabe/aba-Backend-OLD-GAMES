<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
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
            $newReview = new Review();
            $newReview->player_score = $player_score;
            $newReview->player_review = $player_review;
            $newReview->favourite = $favourite;
            $newReview->game_id = $game_id;
            $newReview->user_id = $userId;
            $newReview->save();
            return response()->json(
                [
                    "success" => true,
                    "message" => "Review Created",
                    "data" => $newReview
                ],
                200
            );
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
}
