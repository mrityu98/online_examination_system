<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Admin;
use Hash;
use Illuminate\Support\MessageBag;

class AdminController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function adminlogin()
    {
        return view('userlogin.adminlogin');
    }

    public function adminregistration()
    {
        return view('userregistration.adminregistration');
    }

    public function postLogin(Request $request)
    {
        $errors = new MessageBag; 

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) 
        {
            return redirect()->intended('admindashboard')
                        ->withSuccess('You have Successfully loggedin as Admin');

            // if(auth()->check() && auth()->admin()->is_admin == 1)
            // {
            //     return redirect()->intended('admindashboard')->withSuccess('You have Successfully loggedin as Admin');
            // }
            // if(auth()->check() && auth()->user()->is_admin == 2)
            // {
            //     return redirect()->intended('teacherdashboard')->withSuccess('You have Successfully loggedin as Teacher');
            // }
            // if(auth()->check() && auth()->user()->is_admin == 0)
            // {
            //     return redirect()->intended('studentdashboard')->withSuccess('You have Successfully loggedin as Student');
            // }
        }

       // return redirect()->intended('adminlogin')->withErrors('Opps! You entered invalid credentials');
       else
           $errors = new MessageBag(['password' => ['Email or password invalid.']]); 
           return redirect()->back()->withErrors($errors);
    }

    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);

        return redirect('stu')->with('message');

    }

    public function create(array $data)
    {
      return Admin::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }

    public function admindashboard()
    {
        if(Auth::check()){
            return view('userdashboard.admindashboard');
        }
  
        return redirect()->intended('adminlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function logout() 
    {
        Session::flush();
        Auth::logout();
  
        return Redirect('home');
    }
}
