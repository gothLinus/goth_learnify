<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class VerificationController extends Controller
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

    public function register()
    {
        return view('register');
    }

    public function store(RegisterRequest $request)
    {
        $formFields = $request->validated();
        $formFields['password'] = Hash::make($formFields['password']);
        $user = User::create($formFields);
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in!');
    }
}
