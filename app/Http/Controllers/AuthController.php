<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user with the provided email and password
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // If authentication is successful, redirect to the dashboard
            return redirect()->route('dashboard')->with('success', 'Login successful');
        }

        // If authentication fails, redirect back with an error message
        return back()->withErrors([
            'email' => 'Invalid credentials. Check the email address and password entered.',
        ]);
    }
}

