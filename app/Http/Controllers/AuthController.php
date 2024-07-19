<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store()
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4|confirmed',
        ];
        $message = [
            'name.required' => "The name field is required.",
            'email.required' => "The email field is required.",
            'password.required' => "The password field is required.",
            'name.min' => "The name field must be at least 3 characters.",
            'password.min' => "The password field must be at least 4 characters."
        ];
        $validated = request()->validate($rules, $message);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('dashboard')->with('success', 'Account created!');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate()
    {
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($validated)) {

            request()->session()->regenerate();

            return redirect()->route('dashboard')->with('success', "You're logged in!");
        }
        return redirect()->route('login')->withErrors([
            'email' => "No matching email and password"
        ]);
    }

    public function logout()
    {
        auth()->logout(); //End the auth session of the current user
        request()->session()->invalidate(); //Invalidate the current session, removing all the data of the server
        request()->session()->regenerateToken(); // Regen the CSRF token

        return redirect()->route('dashboard')->with('success', 'Logged out successfully');
    }
}
