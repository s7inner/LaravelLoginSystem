<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('/');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials))
        {
            return $this->handleSuccessfulUsername();
        }

        return $this->handleFailedUsername($credentials['username']);
    }

    protected function handleSuccessfulUsername()
    {
        // Check if the user is an admin
        if (auth()->user()->username === 'admin')
        {
            return redirect()->route('dashboard');
        }

        // If not admin, redirect to "/"
        return redirect('/');
    }

    protected function handleFailedUsername($username)
    {
        // Check if a user with the specified login exists
        $user = User::where('username', $username)->first();

        if ($user)
        {
            // The user exists, but the password is incorrect
            return redirect()->back()->with('error', 'Incorrect password!');
        }
        else
        {
            // User with this login does not exist
            return redirect()->back()->with('error', 'User with this login does not exist!');
        }
    }
}
