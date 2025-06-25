<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create($validatedData);

        Auth::login($user);

        return redirect()->route('books.index')->with('success', 'Registration successful.');
    }

    public function login(Request $request)
    {
        $validatedUser = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::attempt($validatedUser)) {
            return redirect()->route('books.index')->with('success', 'Login successful.');
        } else {
            return redirect()->back()->withErrors(['email' => 'Invalid credentials.'])->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('show.login')->with('success', 'Logout successful.');
    }
}
