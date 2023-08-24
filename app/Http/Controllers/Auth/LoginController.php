<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleGoogleCallback(): RedirectResponse
    {
        $user = Socialite::driver('google')->stateless()->user();

        $this->CreateOrAuthenticate($user);
        return redirect()->route('dashboard');
    }

    public function redirectToFacebook(): RedirectResponse
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }

    public function handleFacebookCallback(): RedirectResponse
    {

        $user = Socialite::driver('facebook')->stateless()->user();

        $this->CreateOrAuthenticate($user);
        return redirect()->route('dashboard');
    }

    protected function CreateOrAuthenticate($data): void
    {
        $user = User::where('email',$data->email)->first();

        if(!$user){
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();
        }
        event(new Registered($user));
        Auth::login($user);
    }
}
