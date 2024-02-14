<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Policies\UserPolicy;
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
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials))
        {
            return $this->handleSuccessfulEmail();
        }

        return $this->handleFailedEmail($credentials['email']);
    }

    protected function handleSuccessfulEmail()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Check if the user is an admin using the UserPolicy
        if (UserPolicy::viewIsAdmin($user))
        {
            return redirect()->route('dashboard');
        }

        // If not admin, redirect to "/"
        return redirect('/');
    }

    protected function handleFailedEmail($email)
    {
        // Check if a user with the specified login exists
        $user = User::where('email', $email)->first();

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
