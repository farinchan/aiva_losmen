<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('front.pages.auth.login');
    }

    public function register()
    {
        return view('front.pages.auth.register');
    }

    public function forgetPassword()
    {
        return view('front.pages.auth.forget_password');
    }
}
