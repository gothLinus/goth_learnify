<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $cards = auth()->user()->cards()->orderBy('updated_at', 'desc')
            ->orderBy('created_at', 'desc')->paginate(6);

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
        return view('auth.forgot-password');
    }

    public function login()
    {
        return view('auth.login');
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
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $formFields = $request->validated();
        $formFields['password'] = Hash::make($formFields['password']);
        $user = User::create($formFields);
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in!');
    }

    public function settings()
    {
        return view('settings');
    }
}
