<?php

namespace App\Http\Controllers\Auth;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class SocialiteController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider, UserRepository $userRepository)
    {
        $providerUser = Socialite::driver($provider)->user();

        $user = $userRepository->createOrReturnUser($providerUser, $provider);

        Auth::login($user);

        return redirect()->route('index');
    }
}
