<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Socialite as SocialiteModel;

class SocialiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
        $socialUser = Socialite::driver($provider)->user();

        $authUser = $this->store($socialUser, $provider);

        Auth::login($authUser);

        return redirect("/");
            } catch (\Exception $e) {
        return redirect('/login')->with('error', 'Something went wrong!');
    }
    }

        public function store($socialUser, $provider)
    {
        $socialAccount = SocialiteModel::where(
            'provider_id',
            $socialUser->getId()
        )->where('provider_name', $provider)->first();

        if (!$socialAccount) {
            $user = User::where('email', $socialUser->getEmail())->first();

            if (!$user) {
                $user = User::updateOrCreate([
                    'user_img' => $socialUser->avatar,
                    'name' => $socialUser->getName() ?
                        $socialUser->getName() : $socialUser->getNickname(),
                    'email' => $socialUser->getEmail(),
                    'password' => Hash::make('password@1234'),
                    'email_verified_at' => now(),
                ]);
            }

            $user->socialite()->create([
                'provider_id' => $socialUser->getId(),
                'provider_name' => $provider,
                'provider_token' => $socialUser->token,
                'provider_refresh_token' => $socialUser->refreshToken,
            ]);

            return $user;
        }
        return $socialAccount->user;
    }
}
