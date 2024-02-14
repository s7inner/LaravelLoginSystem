<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;

class AdminController extends Controller
{
    public function getAllUsers()
    {
        $users = User::all();
        return view('dashboard', compact('users'));
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('dashboard')->with('error', 'User not found');
        }

        $user->delete();

        return redirect()->route('dashboard')->with('success', 'User deleted successfully');
    }
}
