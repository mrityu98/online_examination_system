<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Sentinel;
use Reminder;
use App\Models\User;
use Mail;

class ForgotPassword extends Controller
{
    public function forgot()
    {
        return view('Security.forgot');
    }

    public function passwordreset(Request $request)
    {
        $user = User::whereEmail($request->email)->first();

        if($user == null)
        {
            return redirect()->back()->with(['error' => 'Email Does not Exist']);
        }

        $user = Sentinel::findById($user->id);
        $reminder = Reminder::exists($user) ? : Reminder::create($user);
        $this->sendEmail($user,$reminder->code);

        return redirect()->back()->with(['success' => 'Reset code sent to your email.']);
    }

    public function sendEmail($user,$code)
    {
        Mail::send(
            'email.forgot',
            ['user' =>$user,'code' => $code],
            function($message) use ($user)
            {
                $message->to($user->email);
                $message->subject("$user->name,reset your password .");
            }
        );
    }
}
