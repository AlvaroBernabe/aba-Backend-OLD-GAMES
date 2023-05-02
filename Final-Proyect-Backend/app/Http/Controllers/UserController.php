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
            Log::info("Update Profile Working");
            $validator = Validator::make($request->input(), [
                'name' => 'string|max:70|sometimes',
                'surname' => 'string|max:80|sometimes',
                'phone_number' => 'integer|max:40|sometimes',
                'direction' => 'string|max:110|sometimes',
                'birth_date' => 'date|sometimes',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $userId = auth()->user()->id;
            $profile = Profile::where('user_id', $userId)->first();

            if (!isset($profile)) {
                $profile = Profile::create([
                    'name' => $request['name'],
                    'surname' => $request['surname'],
                    'phone_number' => $request['phone_number'],
                    'direction' => $request['direction'],
                    'birth_date' => $request['birth_date'],
                    'user_id' => $userId,
                ]);

                return response()->json(
                    [
                        "success" => true,
                        "message" => "Profile Created Successfully",
                        "data" => $profile
                    ],
                    200
                );
            }

            $profile->fill($request->only([
                'name', 'surname', 'phone_number', 'direction', 'birth_date'
            ]));
            $profile->save();

            return response()->json(
                [
                    "success" => true,
                    "message" => "Profile Updated Successfully",
                    "data" => $profile
                ],
                200
            );
        } catch (\Throwable $th) {
            Log::error("Error updating user: " . $th->getMessage());

            return response()->json([
                'success' => true,
                'message' => 'User data could not be updated',
            ], 500);
        }
    }

    public function myProfile()
    {
        try {
            Log::info("Get My Profile Working");
            $user = auth()->user();
            $profile = DB::table('profiles')->where('user_id', '=', $user->id)->get();

            return response(
                [
                    "success" => true,
                    "message" => "This is your profile",
                    "data" => [$user->email, $profile, $user->role_id]
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error("Get my Profile error: " . $th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => $th->getMessage()
                ],
                500
            );
        }
    }

    public function getAllUsers()
    {
        try {
            Log::info("Get All Users Working");
            $users = User::query()->get();
            $userId = $users->pluck('id', 'email');

            $profile = DB::table('profiles')->get();
            $profiles = Profile::query()->whereIn('user_id', $userId)->get(['name', 'user_id', 'surname', 'phone_number', 'direction', 'birth_date']);

            $profile = $users->map(function ($datos) use ($profiles) {
                $usuario = $profiles->where('user_id', $datos->id)->first();
                $datos->perfil = $usuario;
                return $datos;
            });

            return [
                "success" => true,
                "message" => "These are all the users",
                "data" => [
                    'resultado' => $profile,
                ]
            ];
        } catch (\Throwable $th) {
            Log::error("Get All Users error: " . $th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => $th->getMessage()
                ],
                500
            );
        }
    }

    public function getUserDetailsByUserId(Request $request, $id)
    {
        try {
            Log::info("Get Users Details By ID Working");
            $user = User::query()->find($id);
            $profile = DB::table('profiles')->where('user_id', '=', $id)->get();

            return response()->json(
                [
                    "success" => true,
                    "message" => "User Details",
                    "data" => [$user->email, $profile]
                ],
                200
            );
        } catch (\Throwable $th) {
            Log::error("Get User Details By ID error: " . $th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => $th->getMessage()
                ],
                500
            );
        }
    }


    public function deleteUserById(Request $request, $id)
    {
        try {
            Log::info("Delete User By Id Working");
            $user = User::find($id);

            if (!($user->role_id != 1)) {
                return response()->json([
                    'success' => false,
                    'message' => 'You can´t delete Yourself or Other Admin'
                ], 400);
            }

            User::destroy($id);
            return response()->json([
                'success' => true,
                'message' => 'User successfully deleted',
            ], 200);
        } catch (\Throwable $th) {
            Log::error("Delete User By Id error: " . $th->getMessage());

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
