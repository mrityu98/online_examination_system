<?php

namespace App\Http\Controllers;

use App\Mail\SendSignupEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\MAil;

class MailController extends Controller
{
    //

    public static function SendSignupEmail($name,$email,$verification_code)
    {
        $data = [
            'name' => $name,
            'verification_code' => $verification_code
        ];
        Mail::to($email)->send(new SignupEmail($data));
    }
}
