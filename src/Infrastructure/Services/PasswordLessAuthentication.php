<?php
/**
 * Created by PhpStorm.
 * User: rndwiga
 * Date: 9/12/18
 * Time: 3:23 PM
 */

namespace Rndwiga\Gatekeeper\Infrastructure\Services;


use Illuminate\Support\Facades\Mail;
use Rndwiga\Gatekeeper\Model\EmailLogin;

class PasswordLessAuthentication
{
    public function sendLoginToken(array $loginDetails){

        $emalLogin = EmailLogin::createForEmail($loginDetails['email']);

        $url = route('auth.email.authentication',[  //building the url that we will send to the user.
            'token' => $emalLogin->token
        ]);

        $content = $url;
        Mail::raw($content, function ($message)  use ($loginDetails){
            $message->to($loginDetails['email']);
            $message->subject(env('APP_NAME') . ' Login Token');
            $message->from(env('MAIL_USERNAME'), env('APP_NAME'));
        });
    }
}
