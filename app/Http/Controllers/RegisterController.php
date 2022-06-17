<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use Illuminate\Support\MessageBag;

class RegisterController extends Controller
{
    //
    public function register(Request $request)
    {
        $user = new USer();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->verification_code = shal(time());
        $user->save();


        if($user == null)
        {
            MailController::SendSignupEmail($user->name,$user->email,$user->verfication_code);
            return redirect()->back()->with(session()->flash('alert-success','Your Account has been successfully Created'));
        }
        
        return redirect()->back()->with(session()->flash('alert-danger','Credentials are wrong'));
    }
}
