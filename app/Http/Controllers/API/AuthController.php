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

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Return a response
        return response()->json([
            "status" => 1,
            "message" => "User registered successfully",
            "data" => [
                'name' => $request->name,
                'email' => $request->email
            ]
        ]);
    }

    public function getBooks()
    {
        $books = Book::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // Logic to retrieve books
        return response()->json([
            "status" => 1,
            "data" => [$books] // Replace with actual book data
        ]);
    }
}
