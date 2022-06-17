<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Session;
use App\Models\User;
use App\Models\Image;
use Hash;
use Mail;
use DB;
use Crypt;
use Illuminate\Support\MessageBag;


class ImageController extends Controller
{
    //
    public function index() 
    {
        if(Auth::check())
        {
            $data = DB::table('images')->where('user_id',Auth::user()->id)->get();
            // $Image = DB::table('images')->where('email','as')->get();
            $count = DB::table('images')->where('user_id',Auth::user()->id)->count();
            
            return view('userdashboard.student_profile',compact('data','count'));
        }
        return redirect()->intended('studentlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function store(Request $request)
    {
        if(Auth::check())
        {
            $user = new Image;

            $user->user_id = $request->input('user_id');
            $user->name = $request->input('name');
            $user->email = $request->input('email');

            if($request->hasfile('image'))
            {
                $name = Auth::user()->email;
                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = $name.'.'.$extenstion; 
                $file->move('uploads/users/', $filename);
                $user->image = $filename;
            }

            $user->save();

            return redirect()->back()->with('status','Image Update Successfully');
        }
        return redirect()->intended('studentlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function stu_image_update(Request $request,$id)
    {
        if(Auth::check())
        {
            $user = Image::find($id);

            if($request->hasfile('image'))
            {
                $destination = 'uploads/users/'.$user->image;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move('uploads/users/', $filename);
                $user->image = $filename;
            }

            $user->update();

            return redirect()->back()->with('status','Image Update Successfully');
        }
        return redirect()->intended('studentlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function update(Request $request,$id)
    {
        if(Auth::check())
        {
            $student = User::find($id);
            $student->name = $request->input('name');
            $student->email = $request->input('email');
            $student->mobile = $request->input('mobile');
            $student->department = $request->input('department');
            $student->year = $request->input('year');
            $student->semester = $request->input('semester');
            $student->dob = $request->input('dob');
            $student->address = $request->input('address');

            $student->update();
        return redirect()->back();
        }
        return redirect()->intended('studentlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function tea_index() 
    {
        if(Auth::check())
        {
            // $img = Auth::user('email');
            $data = DB::table('images')->where('user_id',Auth::user()->id)->get();
            $tea = DB::table('images')->where('user_id',Auth::user()->id)->get();
            // $Image = DB::table('images')->where('email','as')->get();
            $count = DB::table('images')->where('user_id',Auth::user()->id)->count();
            return view('userdashboard.teacherdashboard.teacher_profile',compact('tea','count','data'));
        }
        return redirect()->intended('teacherlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function tea_store(Request $request)
    {
        if(Auth::check())
        {
            $user = new Image;
            $user->user_id = $request->input('user_id');
            $user->name = $request->input('name');
            $user->email = $request->input('email');
    
            if($request->hasfile('image'))
            {
                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move('uploads/users/', $filename);
                $user->image = $filename;
            }
            $user->save();
            return redirect()->back()->with('status','Image Update Successfully');
        }
        return redirect()->intended('teacherlogin')->withSuccess('invalid','Opps! You do not have access');

    }

    public function tea_image_update(Request $request,$id)
    {
        if(Auth::check())
        {
            $user = Image::find($id);

            if($request->hasfile('image'))
            {
                $destination = 'uploads/users/'.$user->image;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move('uploads/users/', $filename);
                $user->image = $filename;
            }
    
            $user->update();
        }
        return redirect()->intended('teacherlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function tea_update(Request $request,$id)
    {
        if(Auth::check())
        {
            $student = User::find($id);
            $student->name = $request->input('name');
            $student->email = $request->input('email');
            $student->mobile = $request->input('mobile');
            $student->department = $request->input('department');
            $student->dob = $request->input('dob');
            $student->address = $request->input('address');
            $student->update();
            return redirect()->back();
        }
        return redirect()->intended('teacherlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function adminprofile()
    {
        if(Auth::check())
        {
            $data = DB::table('images')->where('user_id',Auth::user()->id)->get();
            $count = DB::table('images')->where('user_id',Auth::user()->id)->count();
            return view ('userdashboard.admindashboard.admin_profile',compact('data','count'));
        }
        return redirect()->intended('adminlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function admin_update(Request $request,$id)
    {
        if(Auth::check())
        {
            $admin = User::find($id);
            $admin->name = $request->input('name');
            $admin->email = $request->input('email');
            $admin->mobile = $request->input('mobile');
            $admin->department = $request->input('department');
            $admin->dob = $request->input('dob');
            $admin->address = $request->input('address');
            $admin->update();
            return redirect()->back();
        }
        return redirect()->intended('adminlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function admin_image_update(Request $request,$id)
    {
        if(Auth::check())
        {
            $user = Image::find($id);
            if($request->hasfile('image'))
            {
                $destination = 'uploads/users/'.$user->image;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move('uploads/users/', $filename);
                $user->image = $filename;
            }
            $user->update();
            return redirect()->back()->with('status','Image Update Successfully');
        }
        return redirect()->intended('adminlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function admin_store(Request $request)
    {
        if(Auth::check())
        {
            $user = new Image;
            $user->user_id = $request->input('user_id');
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            if($request->hasfile('image'))
            {
                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move('uploads/users/', $filename);
                $user->image = $filename;
            }
            $user->save();
            return redirect()->back()->with('status','Image Update Successfully');
        }
        return redirect()->intended('adminlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function tea_delete($id)
    {
        if(Auth::check())
        {
            $teacher = User::where('id', $id)->firstorfail()->delete();
            return redirect()->back()->with('status','Data Deleted Successfully.');
        }
        return redirect()->intended('adminlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function stu_delete($id)
    {
        if(Auth::check())
        {
            $student = User::where('id', $id)->firstorfail()->delete();
            return redirect()->back()->with('status','Data Deleted Successfully.');
        }
        return redirect()->intended('adminlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function tea_role_update(Request $request,$id)
    {
        if(Auth::check())
        {
            $tea_role = User::find($id);
            $tea_role->is_admin = $request->input('is_admin');
            $tea_role->update();
            return redirect()->back();
        }
        return redirect()->intended('adminlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function stu_role_update(Request $request,$id)
    {
        if(Auth::check())
        {
            $stu_role = User::find($id);
            $stu_role->is_admin = $request->input('is_admin');
            $stu_role->update();
            return redirect()->back();
        }
        return redirect()->intended('adminlogin')->withSuccess('invalid','Opps! You do not have access');
    }

}
