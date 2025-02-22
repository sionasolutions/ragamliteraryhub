<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show the login form (optional)
    public function showLoginForm()
    {
        return view('Auth.login'); // Adjust with the view you're using for login
    }

    // Handle login request
    public function login(Request $request)
    {
        // Validate the input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Check if the credentials match
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        // Authenticate user with 'remember me' functionality if checked
        if (Auth::attempt($credentials, $request->has('remember-me'))) {
            // Redirect to intended page if login is successful
            return redirect()->intended('admin/dashboard')->with('success', 'Welcome back, ' . Auth::user()->name . '!'); // Change '/dashboard' to your desired route
        }

        // If authentication fails, redirect back with an error message
        return back()->withErrors([
            'email' => 'The provided credentials are incorrect.',
        ]);
    }

    // Logout user
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
