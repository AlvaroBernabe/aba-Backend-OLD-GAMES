<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            Log::info("Middleware isAdmin");
            $userId = auth()->user()->role_id;
            $userRole = Role::find($userId);
            $roleName = $userRole->name;
            if (!($roleName === 'Admin')) {
                return response()->json([
                    'success' => false,
                    'message' => "You Don´t Have The Power"
                ]);
            }
            return $next($request);
        } catch (\Throwable $th) {
            Log::error("Deleted User Reviews Error: " . $th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => $th->getMessage() . 'You are in isAdminToken'
                ],
                500
            );
        }
    }
}
