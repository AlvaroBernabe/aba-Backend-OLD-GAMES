<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function newNews(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'string|max:90',
                'summary' => 'string|max:500',
                'game_id' => 'integer',
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
            // Log::info("New News Working");
            $title = $request->input('title');
            $summary = $request->input('summary');
            $game_id = $request->input('game_id');
            $newNews = new News();
            $newNews->title = $title;
            $newNews->summary = $summary;
            $newNews->game_id = $game_id;
            $newNews->save();
            return response()->json(
                [
                    "success" => true,
                    "message" => "New News Created",
                    "data" => $newNews
                ],
                200
            );
        } catch (\Throwable $th) {
            Log::error("New News error: " . $th->getMessage());
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
