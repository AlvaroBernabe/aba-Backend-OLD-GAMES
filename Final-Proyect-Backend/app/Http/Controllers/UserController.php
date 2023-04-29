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
            $validator = Validator::make($request->input(), [
                'name' => 'string|max:60|sometimes',
                'surname' => 'string|max:60|sometimes',
                'phone_number' => 'integer|sometimes',
                'direction' => 'string|max:90|sometimes',
                'birth_date' => 'date|sometimes',
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
            if (isset($profile)) {
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
            // } else {
            //     $profile->name = $name;
            //     $profile->surname = $surname;
            //     $profile->phone_number = $phone_number;
            //     $profile->direction = $direction;
            //     $profile->birth_date = $birth_date;
            //     $profile->user_id = $userId;
            //     $profile->update();
            //     return response()->json(
            //         [
            //             "success" => true,
            //             "message" => "Profile updated successfully",
            //             "data" => $profile
            //         ],
            //         200
            //     );
            // }
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
            // Log::info("Get My Profile Working");
            $userId = auth()->user()->id;
            $email = auth()->user()->email;
            $roleId = auth()->user()->role_id;
            $profile = DB::table('profiles')->where('user_id', '=', $userId)->get();
            return response(
                [
                    "success" => true,
                    "message" => "This is your profile",
                    "data" => [$email,$profile,$roleId]
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
            // Log::info("Get All Users Working");
            $users = User::query()->get();
            $userId = $users->pluck('id', 'email');
            $profile = DB::table('profiles')->get();
            $perfiles = Profile::query()->whereIn('user_id', $userId)->get(['name', 'user_id', 'surname', 'phone_number', 'direction', 'birth_date']);
            $profile = $users->map(function ($datos) use ($perfiles) {
                $usuario = $perfiles->where('user_id', $datos->id)->first();
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
            $user = User::query()->find($id);
            $userEmail = $user->email;
            $profile = DB::table('profiles')->where('user_id', '=', $id)->get();
            return response()->json(
                [
                    "success" => true,
                    "message" => "User Details",
                    "data" => [$userEmail,$profile]
                ],
                200
            );
        } catch (\Throwable $th) {
            Log::error("Get User Details By Id error: " . $th->getMessage());
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
            if ($user->role_id != 1) {
                User::destroy($id);
                return response()->json([
                    'success' => true,
                    'message' => 'User successfully deleted',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'You cant delete Yourself or Other Admin'
                ], 400);
            }
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
