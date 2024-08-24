<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login.index');
    }
    public function login()
    {
        $credentials =   request()->validate(
            [
                "email" => ["required", "email"],
                "password" => ["required"],
            ]
        );
        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();

            return redirect()->intended('posts');
        }
        return back()->withErrors([
            'email' => 'wrong email or password'
        ])->withInput();
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login'); // Redirect to login page after logout
    }
}
