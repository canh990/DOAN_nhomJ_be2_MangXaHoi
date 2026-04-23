<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialLoginController extends Controller
{
    //
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $userSocial = Socialite::driver('google')->user();

        $user = User::where('email', $userSocial->email)->first();

        if (!$user) {
            $user = User::create([
                'name' => $userSocial->name,
                'email' => $userSocial->email,
                'google_id' => $userSocial->id,
                'password' => bcrypt('12345678')
            ]);
        }

        Auth::login($user);

        return redirect('/home');
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $userSocial = Socialite::driver('facebook')->user();

        $user = User::where('email', $userSocial->email)->first();

        if (!$user) {
            $user = User::create([
                'name' => $userSocial->name,
                'email' => $userSocial->email,
                'facebook_id' => $userSocial->id,
                'password' => bcrypt(uniqid())
            ]);
        }

        Auth::login($user);

        return redirect('/home');
    }
}
