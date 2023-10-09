<?php

namespace App\Http\Controllers;

use App\Events\DefineLoginEvent;
use App\Models\User;
use App\Services\Interfaces\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialProvidersController extends Controller
{
    public function redirect($driver){
        return Socialite::driver($driver)->redirect();
    }

    public function callback(Social $social, $driver){

        try {
            $socialUser = Socialite::driver($driver)->user();
        }catch (\Exception $e){
            return redirect('/login');
        }

        $user = $social->findOrCreateUser($socialUser);
        Auth::login($user, true);
        event(new DefineLoginEvent($user));
        return redirect('/');

    }
}
