<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // View to homepage
    public function index()
    {
        return view('home');
    }

    //  View to loginpage
    public function login()
    {
        return view('login');
    }

    // View to registerpage
    public function register()
    {
        return view('register');
    }
}
