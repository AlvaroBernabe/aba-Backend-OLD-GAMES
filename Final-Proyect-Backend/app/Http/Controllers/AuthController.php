<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            Log::info("Register User Working");
            $validator = Validator::make($request->all(), [
                'email' => 'required|string|email|max:70|unique:users',
                'password' => ['required', 'string', 'max:70', Password::min(8)->mixedCase()->numbers()->symbols()]
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $user = User::create([
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
                'role_id' => 2,
            ]);
            $res = [
                "success" => true,
                "message" => "User Registered Successfully",
                'data' => $user,
            ];

            return response()->json(
                $res,
                Response::HTTP_CREATED
            );
        } catch (\Throwable $th) {
            Log::error("Register User Error: " . $th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Register Error"
                ],
                500
            );
        }
    }

    public function login(Request $request)
    {
        try {
            Log::info("Login User Working");
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);

            $user = User::query()->where('email', $request['email'])->first();
            if (!$user) {
                return response(
                    ["success" => false, "message" => "Email or password are invalid",],
                    Response::HTTP_NOT_FOUND
                );
            }

            if (!Hash::check($request['password'], $user->password)) {
                return response(["success" => true, "message" => "Email or password are invalid"], Response::HTTP_NOT_FOUND);
            };

            $token = $user->createToken('apiToken')->plainTextToken;
            $res = [
                "success" => true,
                "message" => "User Logged Successfully",
                "token" => $token,
                "data" => $user,
            ];
            return response()->json(
                $res,
                Response::HTTP_ACCEPTED
            );
        } catch (\Throwable $th) {
            Log::error("Login error: " . $th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Login Error"
                ],
                500
            );
        }
    }

    public function logout(Request $request)
    {
        try {
            Log::info("Logout User Working");
            $token = $request->user()->currentAccessToken();
            $token->delete();

            return response(
                [
                    "success" => true,
                    "message" => "Logout successfully"
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error("Logout error: " . $th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Logout error"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function changeLogin(Request $request)
    {
        try {
            Log::info("User Login Working");

            $validator = Validator::make($request->all(), [
                'email' => 'required|string|email|max:70|unique:users',
                'password' => ['required', 'string', 'max:70', Password::min(8)->mixedCase()->numbers()->symbols()]
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $userId = auth()->user()->id;
            $email = auth()->user()->email;

            $password = $request->input('password');
            $user_login = User::where('id', $userId)->first();

            if ($user_login->id == $userId) {
                $user_login->id = $userId;
                $user_login->email = $email;
                $user_login->password = bcrypt($password);
                $user_login->update();

                return response()->json(
                    [
                        "success" => true,
                        "message" => "User Login Updated successfully",
                        "data" => $user_login
                    ],
                    200
                );
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'You can´t update other users'
                ], 400);
            }
        } catch (\Throwable $th) {
            Log::error("Logout error: " . $th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Change User Login error"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
