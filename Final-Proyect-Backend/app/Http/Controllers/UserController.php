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
    public function updateProfile(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'string|max:60',
                'surname' => 'string|max:60',
                'phone_number' => 'integer',
                'direction' => 'string|max:90',
                'birth_date' => 'date',
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
            $userId = auth()->user()->id;
            $name = $request->input('name');
            $surname = $request->input('surname');
            $phone_number = $request->input('phone_number');
            $direction = $request->input('direction');
            $birth_date = $request->input('birth_date');
            $profile = Profile::where('user_id', $userId)->first();
            if (is_null($profile)) {
                $profile = new Profile([
                    'name' => $name,
                    'surname' => $surname,
                    'phone_number' => $phone_number,
                    'direction' => $direction,
                    'birth_date' => $birth_date,
                    'user_id' => $userId
                ]);
                $profile->save();
                return response()->json(
                    [
                        "success" => true,
                        "message" => "Profile created successfully",
                        "data" => $profile
                    ],
                    200
                );
            } else {
                $profile->name = $name;
                $profile->surname = $surname;
                $profile->phone_number = $phone_number;
                $profile->direction = $direction;
                $profile->birth_date = $birth_date;
                $profile->user_id = $userId;
                $profile->update();
                return response()->json(
                    [
                        "success" => true,
                        "message" => "Profile updated successfully",
                        "data" => $profile
                    ],
                    200
                );
            }
        } catch (\Throwable $th) {
            Log::error("Error updating user: " . $th->getMessage());
            return response()->json([
                'success' => true,
                'message' => 'User data could not be updated',
            ], 500);
        }
    }
}
