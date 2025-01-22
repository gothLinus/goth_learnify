<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthenticationController extends Controller
{

    public function login()
    {
        return view('log_in');
    }
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required_without:username', 'email'],
            'username' => 'required_without:email',
            'password' => 'required'
        ]);
        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are logged in!');
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.', 'password' => 'The provided credentials do not match our records.']);
    }

    public function register()
    {
        return view('register');
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'email' => ['required','email','max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:8','max:255'],
            'username' => ['required', Rule::unique('users', 'username')],
        ]);
        $formFields['password'] = Hash::make($formFields['password']);
        $user = User::create($formFields);
        auth()->login($user);
        return redirect('/')->with('message','User created and logged in!');
    }
}
