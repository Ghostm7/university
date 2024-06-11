<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegisterForm(){
        return view('register');
    }

    public function register(Request $request){

        // Create a new user instance after a valid registration
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect to a desired route or page
        return redirect()->route('Login.form')->with('success', 'Registration successful! Please login.');
    }

// LOGIN
    public function showLoginForm(){
        return view('login');
    }

    public function login(Request $request){

        // Validate the incoming request data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication was successful
            $request->session()->regenerate();
            return redirect()->intended('Dashboard');
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'Invalid Credentials.',
        ]);
    }
}