<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

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

        // Return a response
        return response()->json([
            "status" => 1,
        ]);
    }
}
