<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public function showLogin()
    // {
    // // Form View
    //     return View:: make('login');
    // }
    // public function doLogout()
    // {
    //     Auth::logout(); // logging out user
    //     return Redirect::to('login'); // redirection to login screen
    // }
    // public function doLogin()
    // {
    // // Creating Rules for Email and Password
    // $rules = array(
    //                 'email' => 'required|email',
    //                 'roll' => 'required|roll', // make sure the email is an actual email
    //                 'password' => 'required|alphaNum|min:8'
    //               );
    //   // password has to be greater than 3 characters and can only be alphanumeric and);
    //   // checking all field
    //   $validator = Validator :: make(Input::all() , $rules);
    //   // if the validator fails, redirect back to the form
    //   if ($validator->fails())
    //     {
    //     return Redirect::to('login')
    //     ->withErrors($validator) // send back all errors to the login form
    //     ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
    //     }
    //   else
    //     {
    //     // create our user data for the authentication
    //     $userdata = array(
    //       'email' => Input::get('email') ,
    //       'password' => Input::get('password'),
    //       'roll'=>Input::get('roll')
    //     );
    //     // attempt to do the login
    //     if (Auth::attempt($userdata))
    //       {
    //       // validation successful
    //       // do whatever you want on success
    //       }
    //       else
    //       {
    //       // validation not successful, send back to form
    //       return Redirect::to('login');
    //       }
    //     }
    // }
}
