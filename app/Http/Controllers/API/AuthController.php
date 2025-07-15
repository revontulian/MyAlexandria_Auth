<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Book;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validate the request data
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                "status" => 0,
                "message" => "Validation failed",
                "data" => $validatedData->errors()->all()
            ]);
        }

        $user=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token=$user->createToken('auth_token')->accessToken;

        return response([
            'token' => $token,
        ]);
        /*        return response()->json([
            "status" => 1,
            "message" => "User registered successfully",
            "data" => [
                'name' => $request->name,
                'email' => $request->email,
                'token' => $token
            ]
        ]);
        */
    }

    public function login(Request $request) //TO REVIEW
    {
        // Validate the request data
        $validatedData = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                "status" => 0,
                "message" => "Validation failed",
                "data" => $validatedData->errors()->all()
            ]);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->accessToken;

            return response()->json([
                "status" => 1,
                "message" => "Login successful",
                "data" => [
                    'name' => $user->name,
                    'email' => $user->email,
                    'token' => $token
                ]
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Invalid credentials"
            ]);
        }
    }

    public function logout(Request $request)
    {
        // Revoke all tokens
        $request->user()->tokens()->each(function($token) {
            $token->delete();
        });

        return response()->json([
            "status" => 1,
            "message" => "Logout successful"
        ]);
    }
}
