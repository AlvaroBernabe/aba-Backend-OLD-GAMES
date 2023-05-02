<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function changeUserToAdmin(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'integer',
                'role_id' => 'integer',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $id = $request->input('id');
            $role_id = $request->input('role_id');
            $user_role = User::where('id', $id)->first();

            if (!($user_role->role_id != 1)) {
                return response()->json([
                    'success' => false,
                    'message' => 'You can´t change the role of Admin'
                ], 400);
            }

            $user_role->id = $id;
            $user_role->role_id = $role_id;
            $user_role->update();

            return response()->json(
                [
                    "success" => true,
                    "message" => "Role updated successfully",
                    "data" => $user_role
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
}
