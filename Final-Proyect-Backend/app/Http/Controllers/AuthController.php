<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
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
            $token = $user->createToken('apiToken')->plainTextToken;
            $res = [
                "success" => true,
                "message" => "User registered successfully",
                'data' => $user,
                "token" => $token
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
}
