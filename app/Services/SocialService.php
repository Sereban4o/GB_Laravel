<?php

namespace App\Services;

use App\Events\DefineLoginEvent;
use App\Models\User;
use App\Services\Interfaces\Social;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\User as SocialUser;

class SocialService implements Social
{

    public function findOrCreateUser(SocialUser $socialUser): User
    {
        $user=User::query()->where('email', '=', $socialUser->getEmail())->first();

        if(!$user){
            $user = User::create([
                'email'=>$socialUser->getEmail(),
                'name'=>$socialUser->getName(),
                'avatar'=>$socialUser->getAvatar(),
                'password'=>Hash::make(Str::random(15)),
            ]);
        }

        $user->avatar = $socialUser->getAvatar();
        $user->save();



        return $user;
    }
}
