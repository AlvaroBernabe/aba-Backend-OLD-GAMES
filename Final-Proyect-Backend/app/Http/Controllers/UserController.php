<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function PHPUnit\Framework\isNull;


class UserController extends Controller
{
    public function updateprofile(Request $request)
    {
        try {
            // Log::info("Update Profile Working");
            $userId = auth()->user()->id;
            // $id2 = DB::table('profiles')->where('user_id', '=', $id)->select();
            // $validator = Validator::make($request->all(), [
            //     'name' => 'string|max:60',
            //     'surname' => 'string|max:60',
            //     'phone_number' => 'integer',
            //     'direction' => 'string|max:90',
            //     'birth_date' => 'date|max:60',
            // ]);
            // if ($validator->fails()) {
            //     return response()->json($validator->errors(), 400);
            // }
            $profile = Profile::where('user_id', '=', $userId)->get();
            if (!$profile) {
                return response()->json(
                    [
                        "success" => true,
                        "message" => "User doesn't exists",
                    ],
                    404
                );
            }
            $name = $request->input('name');
            $surname = $request->input('surname');
            $phone_number = $request->input('phone_number');
            $direction = $request->input('direction');
            $birth_date = $request->input('birth_date');
            $profile = new Profile();
            if (isNull($name, $surname, $phone_number, $direction, $birth_date)) {
                $profile->name = $name;
                $profile->surname = $surname;
                $profile->phone_number = $phone_number;
                $profile->direction = $direction;
                $profile->birth_date = $birth_date;
                $profile->user_id = $userId;
            }
            $profile->save();
            return response()->json(
                [
                    "success" => true,
                    "message" => "Profile Updated Correctly",
                    "data" => $profile
                ],
                200
            );
        } catch (\Throwable $th) {
            Log::error("Update Profile error: " . $th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => $th->getMessage() . $userId
                ],
                500
            );
        }
    }
}
