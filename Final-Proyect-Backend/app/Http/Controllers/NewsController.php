<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\News;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function getAllNews()
    {
        try {
            // Log::info("Get All News Working");
            $news = News::where('game_id', '!=', 0)->get();
            // $stations = news::find(1);     
            $news->get();
            // $messagedUsers = News::whereHas('game_id',function(Builder $query){
            //     $query->where('game_id', auth()->user()->id)
            // })->with('latestComment')
            // ->get();
            foreach ($news as $data){
                    $gameId = $news->game_id;
                    $gameFind = Game::query()->where('id', '=', $gameId)->first();
                    $gameName = $gameFind->name;
                    return [
                        "success" => true,
                        "message" => "These are all the news",
                        "data" => [$gameName,$news]
                        
                    ];
                }

            // $news = News::query()->first();
            // $gameId = $news->game_id;
            // $gameFind = Game::query()->where('id', '=', $gameId)->first();
            // $gameName = $gameFind->name;
        } catch (\Throwable $th) {
            Log::error("Get All News Error: " . $th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => $th->getMessage() .$news
                ],
                500
            );
        }
    }


}
