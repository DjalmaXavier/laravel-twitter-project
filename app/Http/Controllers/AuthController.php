<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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

        redirect()->route('dashboard')->with('success', 'Account created!');
    }
}
