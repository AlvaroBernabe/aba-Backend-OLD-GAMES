<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class GameController extends Controller
{
    public function newGame(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'string|max:90',
                'description' => 'string|max:500',
                'score' => 'numeric',
                'genre' => 'string|max:90',
                'publisher' => 'string|max:90',
                'release_date' => 'date',
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
            // Log::info("New Game Working");
            $name = $request->input('name');
            $description = $request->input('description');
            $score = $request->input('score');
            $genre = $request->input('genre');
            $publisher = $request->input('publisher');
            $release_date = $request->input('release_date');
            $newGame = new Game();
            $newGame->name = $name;
            $newGame->description = $description;
            $newGame->score = $score;
            $newGame->genre = $genre;
            $newGame->publisher = $publisher;
            $newGame->release_date = $release_date;
            $newGame->save();
            return response()->json(
                [
                    "success" => true,
                    "message" => "New Game Created",
                    "data" => $newGame
                ],
                200
            );
        } catch (\Throwable $th) {
            Log::error("New Game error: " . $th->getMessage());
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
