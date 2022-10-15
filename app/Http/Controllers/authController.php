<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // handel GET /register

        if ($request->isMethod('get')) {
            return view('auth.register');
        }
        
        // handel POST /register
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()
            ->route('login')
            ->with('success', 'Your account has been created! You can now login.');
    }

    public function login(Request $request)
    {
        // handel GET /login
        if ($request->isMethod('get')) {
            return view('auth.login');
        }


        // handel POST /login
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()
                ->route('home')
                ->with('success', 'You are logged in!');
        }

        // if the user doesn't exist in the DB

        return redirect()
            ->route('login')
            ->withErrors('Provided login information is not valid.');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('home')
            ->with('success', 'You are logged out.');
    }
}
