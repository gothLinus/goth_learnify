<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $cards = auth()->user()->cards()->paginate(6);

        return view('welcome', compact('cards'));
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'You have been logged out!');
    }

    public function forgotPassword()
    {
        return view('forgot_password');
    }
}
