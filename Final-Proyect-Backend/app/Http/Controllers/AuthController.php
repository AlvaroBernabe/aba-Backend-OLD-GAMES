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

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function register(Request $request)
    {
        try {
            // Log::info("Register User Working");
            $validator = Validator::make($request->all(), [
                'email' => 'required|string|email|max:70|unique:users',
                'password' => ['required','string','max:70',Password::min(8)->mixedCase()->numbers()->symbols()]
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
            $user = User::create([
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
                'role_id' => 2,
            ]);
            // $token = $user->createToken('apiToken')->plainTextToken;
            $res = [
                "success" => true,
                "message" => "User registered successfully",
                'data' => $user,
                // "token" => $token
            ];
            return response()->json(
                $res,
                Response::HTTP_CREATED
            );
        } catch (\Throwable $th) {
            Log::error("Register error: " . $th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => "Register error"
                ],
                500
            );
        }
    }
    

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $user = User::where('email', $request['email'])->first();
        $token = auth()->login($user);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        return response()->json([
                'status' => 'success',
                'authorisation' => [
                    'token' => $token,
                    'user' => $user,
                ]
            ]);
    }

    public function logout(Request $request)
    {
        try {
            // Log::info("Logout User Working");
            $accessToken = $request->bearerToken();
            $token = PersonalAccessToken::findToken($accessToken);
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
                    "message" => "Profile error"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function changeLogin(Request $request)
    {
        try {
            // Log::info("Change User Login Working");
            $validator = Validator::make($request->all(), [
                'email' => 'required|string|email|max:70|unique:users',
                'password' => ['required','string','max:70',Password::min(8)->mixedCase()->numbers()->symbols()]
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
            $userId = auth()->user()->id;
            $email = $request->input('email');
            $password = $request->input('password');
            $user_login = User::where('id', $userId)->first();
            if ($user_login->id == $userId)  {
                $user_login->id = $userId;
                $user_login->email = $email;
                $user_login->password = bcrypt($password);
                $user_login->update();
                $accessToken = $request->bearerToken();
                $token = PersonalAccessToken::findToken($accessToken);
                $token->delete();
                $token = $user_login->createToken('apiToken')->plainTextToken;
                return response()->json(
                    [
                        "success" => true,
                        "message" => "User Login Updated successfully",
                        "data" => $user_login,$token
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
