<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function firstFunction()
    {
        $name = "yousef";
        $books = ["php", "laravel", "ai"];
        return view('test', ['name' => $name, "books" => $books]);
    }
}
