<?php
/**
 * Created by PhpStorm.
 * User: LordPrimusTL
 * Date: 9/13/2017
 * Time: 1:25 PM
 */

namespace App\mailers;


use Illuminate\Support\Facades\Mail;

class MailFacade
{
    public function send($email, $msg, $sub)
    {
        $email = explode(',',$email);
        Mail::send('User.Email.activate', ['msg' => $msg], function ($message) use ($email, $sub)
        {

            $message->from('Info@CMIC.com', 'CMIC Investment');
            $message->subject($sub);
            $message->to($email);

        });
    }
}