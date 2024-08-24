<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register.index');
    }

    public function store()
    {
        request()->validate([
            "email" => [
                "unique:users,email",
                'required',
                'email'
            ],
            "name" => ['required'],
            "password" => ['required', 'min:5'],
        ]);

        $user = User::create([
            'name' => request()->name,
            'email' => request()->email,
            'password' => request()->password,
        ]);

        Auth::login($user);
        return redirect()->intended('posts');
    }
}
