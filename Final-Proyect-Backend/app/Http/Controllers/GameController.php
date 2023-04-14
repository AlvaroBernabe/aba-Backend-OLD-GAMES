<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\isNull;

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

    public function updateGameId(Request $request, $id)
    {
        try {
            // Log::info("Update Game by Id Admin Working");
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
            $name = $request->input('name');
            $description = $request->input('description');
            $score = $request->input('score');
            $genre = $request->input('genre');
            $publisher = $request->input('publisher');
            $release_date = $request->input('release_date');
            $gameUpdate = Game::find($id);
            if (IsNull($name, $description, $score, $genre, $publisher, $release_date)) {
                $gameUpdate->name = $name;
                $gameUpdate->description = $description;
                $gameUpdate->score = $score;
                $gameUpdate->genre = $genre;
                $gameUpdate->publisher = $publisher;
                $gameUpdate->release_date = $release_date;
            }
            $gameUpdate->save();
            return response()->json(
                [
                    "success" => true,
                    "message" => "Updated Game Correctly",
                    "data" => $gameUpdate
                ],
                200
            );
        } catch (\Throwable $th) {
            Log::error("Update Game by Id Admin  Error: " . $th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => $th->getMessage()
                ],
                500
            );
        }
    }

    public function getAllGames()
    {
        try {
            // Log::info("Get All Games Working");
            $games = Game::query()->get();
            return [
                "success" => true,
                "message" => "These are all the games",
                "data" => $games
            ];
        } catch (\Throwable $th) {
            Log::error("Get All Games Error: " . $th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => $th->getMessage()
                ],
                500
            );
        }
    }

    public function getGameById($id)
    {
        try {
            // Log::info("Get Game by ID Working");
            $games = Game::find($id);
            return [
                "success" => true,
                "message" => "These are all the games",
                "data" => $games
            ];
        } catch (\Throwable $th) {
            Log::error("Get Game by ID  Error: " . $th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => $th->getMessage()
                ],
                500
            );
        }
    }

    public function deleteGameByIdAdmin(Request $request, $id)
    {
        try {
            Log::info("Delete Game By Id Admin Working");
            Game::destroy($id);
            return response()->json([
                'success' => true,
                'message' => 'Game successfully deleted',
            ], 200);
        } catch (\Throwable $th) {
            Log::error("Delete Game By Id Admin Error: " . $th->getMessage());
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
