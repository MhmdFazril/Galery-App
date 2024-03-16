<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
        return view('authentication.login', [
            'title' => 'Login',
        ]);
    }

    public function register()
    {
        return view('authentication.register', [
            'title' => 'register',
        ]);
    }

    public function registStore(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'username' => 'required|max:20|unique:users',
            'password' => 'required|min:8|max:255',
        ]);
    }
}
