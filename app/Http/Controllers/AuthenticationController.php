<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Laravel\Socialite\Facades\Socialite;

class AuthenticationController extends Controller
{

    public function login()
    {
        return view('log_in');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string'
        ]);
        $loginField = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (auth()->attempt([$loginField => $request->login, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are logged in!');
        }

        return back()->withErrors(['login' => 'The provided credentials do not match our records.', 'password' => 'The provided credentials do not match our records.']);
    }

    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:8', 'max:255'],
            'username' => ['required', Rule::unique('users', 'username')],
        ]);
        $formFields['password'] = Hash::make($formFields['password']);
        $user = User::create($formFields);
        auth()->login($user);
        return redirect('/')->with('message', 'User created and logged in!');
    }

    public function providerRedirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function providerCallback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();

        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser) {
            auth()->login($existingUser);
            return redirect('/')->with('message', 'User created and logged in!');
        } else {
            $newUser = User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'provider' => $provider,
                'provider_id' => $user->getId(),
            ]);

            auth()->login($newUser);
        }

        return redirect('/')->with('message', 'User created and logged in!');
    }
}
