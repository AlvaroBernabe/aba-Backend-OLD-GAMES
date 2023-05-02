<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\News;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\isNull;

class NewsController extends Controller
{
    public function newNews(Request $request)
    {
        try {
            Log::info("New News Working");

            $validator = Validator::make($request->all(), [
                'news_image' => 'string',
                'title' => 'string|max:110',
                'summary' => 'string|max:500',
                'game_id' => 'integer',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $news_image = $request->input('news_image');
            $title = $request->input('title');
            $summary = $request->input('summary');
            $game_id = $request->input('game_id');

            $newNews = new News();
            $newNews->news_image = $news_image;
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
            Log::info("Get All News Working");
            $news = News::query()->get();

            foreach ($news as $data) {
                $gameId = $data->game_id;
                $gameFind = Game::where('id', '=', $gameId)->first();
                $gameName = $gameFind->name;
                $result[] = [
                    "game_name" => $gameName,
                    "news" => $data
                ];
            }

            return [
                "success" => true,
                "message" => "These are all the news",
                "data" => $result
            ];
        } catch (\Throwable $th) {
            Log::error("Get All News Error: " . $th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => $th->getMessage() . $news
                ],
                500
            );
        }
    }

    public function deleteNewsByIdAdmin(Request $request, $id)
    {
        try {
            Log::info("Delete News By Id Admin Working");
            News::destroy($id);

            return response()->json([
                'success' => true,
                'message' => 'News successfully deleted',
            ], 200);
        } catch (\Throwable $th) {
            Log::error("Delete News By Id Admin Error: " . $th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => $th->getMessage()
                ],
                500
            );
        }
    }

    public function updateNewsId(Request $request, $id)
    {
        try {
            Log::info("Update News by Id Admin Working");
            $validator = Validator::make($request->all(), [
                'title' => 'string|max:90',
                'summary' => 'string|max:500',
                'game_id' => 'integer',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $title = $request->input('title');
            $summary = $request->input('summary');
            $game_id = $request->input('game_id');
            $updateNews = News::find($id);

            if (IsNull($title, $summary, $game_id)) {
                $updateNews->title = $title;
                $updateNews->summary = $summary;
                $updateNews->game_id = $game_id;
            }
            $updateNews->save();

            return response()->json(
                [
                    "success" => true,
                    "message" => "Updated News",
                    "data" => $updateNews
                ],
                200
            );
        } catch (\Throwable $th) {
            Log::error("Update News by Id Admin  Error: " . $th->getMessage());

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
