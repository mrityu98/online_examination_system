<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Image;
use Hash;
use Mail;
use DB;
use Crypt;
use Illuminate\Support\MessageBag;

class ExamController extends Controller
{
    //

    public function adminexam()
    {
        if(Auth::check())
        {
            $data = DB::table('images')->where('user_id',Auth::user()->id)->get();
            $exam = Exam::where('is_admin','=','1')->get();
            $questions = Question::where('is_admin','=','1')->get();
            $question = DB::table('questions')->where('is_admin','=','1')->get();     
            $ques = DB::table('questions')->where('questions.teacher','=',Auth::user()->name)->where('is_admin','=','1')->get();
            return view('userdashboard.admindashboard.admin_exam',compact('exam','question','ques','questions','data'));
        }
        return redirect()->intended('adminlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function store(Request $request)
    {
        if(Auth::check())
        {
            $user = new Exam;
            $user->name = $request->input('name');
            $user->subject = $request->input('subject');
            $user->department = $request->input('department');
            $user->year = $request->input('year');
            $user->semester = $request->input('semester');
            $user->date = $request->input('date');
            $user->start_time = $request->input('start_time');
            $user->duration = $request->input('duration');
            $user->t_question = $request->input('t_question');
            $user->teacher_id = $request->input('teacher_id');
            $user->teacher = $request->input('teacher');
            $user->save();
            return redirect()->back();
        }
        return redirect()->intended('adminlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function exam_data_update(Request $request,$id)
    {
        if(Auth::check())
        {
            $exam = Exam::find($id);
            $exam->name = $request->input('name');
            $exam->subject = $request->input('subject');
            $exam->department = $request->input('department');
            $exam->year = $request->input('year');
            $exam->semester = $request->input('semester');
            $exam->date = $request->input('date');
            $exam->start_time = $request->input('start_time');
            $exam->duration = $request->input('duration');
            $exam->t_question = $request->input('t_question');
            $exam->teacher_id = $request->input('teacher_id');
            $exam->teacher = $request->input('teacher');
            $exam->update();
            return redirect()->back();
        }
        return redirect()->intended('adminlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function exam_delete($id)
    {
        if(Auth::check())
        {
            $exam = Exam::where('id', $id)->firstorfail()->delete();
            return redirect()->back();
        }
        return redirect()->intended('adminlogin')->withSuccess('invalid','Opps! You do not have access');
    }
}
