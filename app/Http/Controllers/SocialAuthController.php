<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use App\SocialAccountService;

use App\Http\Requests;

class SocialAuthController extends Controller
{
    //
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback(SocialAccountService $service)
    {
        // when facebook call us a with token
        $user = $service->createOrGetUser(Socialite::driver('google')->user());

        auth()->login($user);

        return redirect()->to('/home');
    }
}
