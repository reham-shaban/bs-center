<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;

class AuthController extends Controller
{
    // Login API - POST (email, password)
    public function login(Request $request)
    {
        try {
            // Check if email and password are present in the request
            if (!$request->has('email') || !$request->has('password')) {
                return response()->json(['message' => 'Email and password are required'], 400);
            }

            // Validation
            $request->validate([
                "email" => "required|email",
                "password" => "required"
            ]);

            // Attempt to authenticate the user
            $token = auth()->attempt([
                "email" => $request->email,
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
