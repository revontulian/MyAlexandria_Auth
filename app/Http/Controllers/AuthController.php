<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        // Handle registration logic
    }

    public function login(Request $request)
    {
        // Handle login logic
    }

    public function logout()
    {
        // Handle logout logic
    }
}
