<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function createOrReturnUser($providerUser, $provider)
    {
        return User::firstOrCreate(['soc_id' => $providerUser->id],[
            'name' => $providerUser->name,
            'email'=> $providerUser->email ?? 'none',
            'password' => '',
            'profile_photo_url' => $providerUser->avatar,
            'auth_with' => $provider,
            'soc_id' => $providerUser->id
        ]);
    }
}
