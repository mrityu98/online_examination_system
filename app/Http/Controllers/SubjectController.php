<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Models\Subject;
use Hash;
use Mail;
use DB;
use Crypt;
use Illuminate\Support\MessageBag;

class SubjectController extends Controller
{
    //

    public function adminsubject()
    {
        if(Auth::check())
        {
            $subject = DB::table('subjects')->get();
            $data = DB::table('images')->where('user_id',Auth::user()->id)->get();
            return view ('userdashboard.admindashboard.admin_subject',compact('subject','data'));
        }
        return redirect()->intended('adminlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function subject_store(Request $request)
    {
        if(Auth::check())
        {
            $user = new Subject;
            $user->subject = $request->input('subject');
            $user->department = $request->input('department');
            $user->year = $request->input('year');
            $user->semester = $request->input('semester');
            $user->teacher = $request->input('teacher');
            $user->save();
            return redirect()->back()->with('status','Image Update Successfully');
        }
        return redirect()->intended('adminlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function subject_update(Request $request,$id)
    {
        if(Auth::check())
        {
            $sub_update = Subject::find($id);
            $sub_update->subject = $request->input('subject');
            $sub_update->department = $request->input('department');
            $sub_update->year = $request->input('year');
            $sub_update->semester = $request->input('semester');
            $sub_update->teacher = $request->input('teacher');
            $sub_update->update();
            return redirect()->back();
        }
        return redirect()->intended('adminlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function subject_delete($id)
    {
        if(Auth::check())
        {
            $subject = Subject::where('id', $id)->firstorfail()->delete();
            return redirect()->back();
        }
        return redirect()->intended('adminlogin')->withSuccess('invalid','Opps! You do not have access');
    }
}
