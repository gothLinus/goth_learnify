<?php

namespace App\Http\Controllers;

class RegisterController extends Controller
{

    /*
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
        }*/
}
