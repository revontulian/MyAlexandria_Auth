<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Logic to retrieve and return a list of users
        $users = User::all()->sortBy('name');
        return view('users.admin', ['users' => $users]);
    }

    public function show($id)
    {
        // Logic to retrieve and return a specific user by ID
        $user = User::findOrFail($id);
        return view('users.show', ['user' => $user]);
    }

    public function makeAdmin($id)
    {
        $user = User::findOrFail($id);

        // Decode roles JSON to array
        $roles = json_decode($user->roles, true) ?? [];

        // Add 'admin' if not already present
        if (!in_array('admin', $roles)) {
            $roles[] = 'admin';
        }

        // Encode back to JSON
        $user->roles = json_encode($roles);
        $user->save();

        return redirect()->route('users.admin')->with('success', 'User made admin successfully!');
    }

    public function dismissAdmin($id)
{
    $user = User::findOrFail($id);

    // Decode roles JSON to array
    $roles = json_decode($user->roles, true) ?? [];

    // Remove 'admin' role if present
    $roles = array_values(array_filter($roles, function($role) {
        return $role !== 'admin';
    }));

    // Encode back to JSON
    $user->roles = json_encode($roles);
    $user->save();

    return redirect()->route('users.admin')->with('success', 'Admin privileges removed successfully!');
}

    public function destroy($id)
    {
        // route '/destroy/{id}' to delete a user
        // Logic to delete a user by ID
        $user = User::findOrFail($id);
        $user->delete();

        // Redirect to the index page with a success message
        return redirect()->route('users.admin')->with('success', 'User deleted successfully!');
    }
}
