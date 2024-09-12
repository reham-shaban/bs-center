<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;

class AuthController extends Controller
{
    // Login API - POST (name, password)
    public function login(Request $request)
    {
        try {
            // Check if name and password are present in the request
            if (!$request->has('name') || !$request->has('password')) {
                return response()->json(['message' => 'Name and password are required'], 400);
            }

            // Validation
            $request->validate([
                "name" => "required|string",
                "password" => "required"
            ]);

            // Attempt to authenticate the user
            $token = auth()->attempt([
                "name" => $request->name,
                "password" => $request->password
            ]);

            if (!$token) {
                return response()->json([
                    "status" => false,
                    "message" => "Invalid login details"
                ], 401);
            }

            // Get the authenticated user
            $user = auth()->user();

            return response()->json([
                "status" => true,
                "message" => "User logged in",
                "token" => $token,
                "user" => $user,
            ]);
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "message" => "An error occurred during login",
                "error" => $e->getMessage()
            ], 500);
        }
    }


    // Logout API - GET (JWT Auth Token)
    public function logout()
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken()); // Use JWT facade to invalidate token

            return response()->json([
                "status" => true,
                "message" => "User logged out"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "message" => "An error occurred during logout",
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
