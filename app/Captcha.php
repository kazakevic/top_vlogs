<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use ReCaptcha\ReCaptcha;

use App\Http\Requests;

class Captcha
{
    //
    public static function captchaCheck()
    {

        $response = Input::get('g-recaptcha-response');
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $secret   = env('RE_CAP_SECRET');

        $recaptcha = new ReCaptcha($secret);
        $resp = $recaptcha->verify($response, $remoteip);
        if ($resp->isSuccess()) {
            return true;
        } else {
            return false;
        }

    }
}
