<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function login()
    {
        return view('log_in');
    }

    public function authenticate(LoginRequest $request)
    {
        $loginField = $request->loginField();
        $remember = $request->remember();
        if (auth()->attempt([$loginField => $request->login, 'password' => $request->password], $remember)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are logged in!');
        }

        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
            'password' => 'The provided credentials do not match our records.',
        ]);
    }
}
