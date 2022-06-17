<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Subject;
use App\Models\Question;
use App\Models\Exam;
use App\Models\Result;
use App\Models\Image;
use Hash;
use DB;
use Illuminate\Support\MessageBag;
use Exception;

class TeacherController extends Controller
{

    public function teacherstudent()
    {
        if(Auth::check())
        {
            $student = DB::table('subjects')->where('users.department','=',Auth::user()->department)
                ->where('subjects.teacher','=',Auth::user()->name)
                ->join('users', 'users.year', '=', 'subjects.year')
                ->where('users.is_admin','=','0')
                ->get();
            $data = DB::table('images')->where('user_id',Auth::user()->id)->get();
            return view('userdashboard.teacherdashboard.teacher_student',compact('student','data'));
        }
        return redirect()->intended('teacherlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function teachersubject()
    {
        if(Auth::check())
        {
                // $response1 = User::join('subjects', 'users.name', '=', 'subjects.teacher')
                //        ->get( 'subjects.subject');
        
            $subject= Subject::where('subjects.teacher', '=',Auth::user()->name)->get('subjects.subject');

            $class= Subject::where('subjects.teacher', '=',Auth::user()->name)->get(['subjects.department','subjects.year','subjects.semester']);

            // $class = DB::table('subjects')
            //        ->select('subjects.department','subjects.year','subjects.semester')
            //        ->join('users', 'users.name', '=', 'subjects.teacher')
            //        ->get();
            $data = DB::table('images')->where('user_id',Auth::user()->id)->get();
            return view('userdashboard.teacherdashboard.teacher_subject',compact('subject','class','data'));
        }
        return redirect()->intended('teacherlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function studentsubject()
    {
        if(Auth::check())
        {
            $subject= Subject::where('subjects.department', '=',Auth::user()->department)
                              ->where('subjects.year', '=',Auth::user()->year)
                              ->where('subjects.semester', '=',Auth::user()->semester)
                              ->get('subjects.subject');
            $teacher= Subject::where('subjects.department', '=',Auth::user()->department)
                              ->where('subjects.year', '=',Auth::user()->year)
                              ->where('subjects.semester', '=',Auth::user()->semester)
                              ->get('subjects.teacher');
            $data = DB::table('images')->where('user_id',Auth::user()->id)->get();
            return view('userdashboard.studentdashboard.studentsubject.student_subject',compact('subject','teacher','data'));
        }
        return redirect()->intended('studentlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function teacherclass()
    {
        if(Auth::check())
        {
            $class = DB::table('subjects')->where('users.department','=',Auth::user()->department)
            ->where('subjects.teacher','=',Auth::user()->name)
            ->join('users', 'users.year', '=', 'subjects.year')
            ->where('users.is_admin','=','0')
            ->get();
    
            $data = DB::table('images')->where('user_id',Auth::user()->id)->get();
            // $class1 = User::where('users.is_admin','=','0')
            //                 ->join('subjects', 'users.department', '=', 'subjects.department')
            //                 ->where('subjects.teacher','=',Auth::user()->name)
            //                 ->get();
            // $student = DB::table('users')->where('is_admin', '0')->get();
            return view('userdashboard.teacherdashboard.teacher_class',compact('class','data'));
        }
        return redirect()->intended('teacherlogin')->withSuccess('invalid','Opps! You do not have access');
    }


    public function studentclass()
    {
        if(Auth::check())
        {
            $data = DB::table('images')->where('user_id',Auth::user()->id)->get();
            return view('userdashboard.studentdashboard.studentclass.student_class',compact('data'));
        }
        return redirect()->intended('studentlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function teacherexam()
    {
        if(Auth::check())
        {
            $exam = DB::table('exams')->where('exams.teacher','=',Auth::user()->name)->where('is_admin','=','1')->get();

            $question = DB::table('questions')->where('questions.teacher','=',Auth::user()->name)->where('is_admin','=','1')->get();
            
            $ques = DB::table('questions')->where('questions.teacher','=',Auth::user()->name)->where('is_admin','=','1')->get();
    
            $status = DB::table('exams')->where('exams.teacher','=',Auth::user()->name)->where('is_admin','=','1')->get();
    
            $data = DB::table('images')->where('user_id',Auth::user()->id)->get();
            return view('userdashboard.teacherdashboard.teacher_exam',compact('exam','question','ques','status','data'));
        }
        return redirect()->intended('teacherlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function teacherquestion(Request $request)
    {
        if(Auth::check())
        {
            $question = new Question;

            $question->exam_id = $request->input('exam_id');
            $question->exam_name = $request->input('exam_name');
            $question->question = $request->input('question');
            $question->op_1 = $request->input('op_1');
            $question->op_2 = $request->input('op_2');
            $question->op_3 = $request->input('op_3');
            $question->op_4 = $request->input('op_4');
            $question->r_op = $request->input('r_op');
            $question->teacher_id = $request->input('teacher_id');
            $question->teacher = $request->input('teacher');
            $question->save();
    
            return redirect()->back();
        }
        return redirect()->intended('teacherlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function question_data_update(Request $request,$id)
    {
        if(Auth::check())
        {
            $Question = Question::find($id);
            $Question->exam_id = $request->input('exam_id');
            $Question->exam_name = $request->input('exam_name');
            $Question->question = $request->input('question');
            $Question->op_1 = $request->input('op_1');
            $Question->op_2 = $request->input('op_2');
            $Question->op_3 = $request->input('op_3');
            $Question->op_4 = $request->input('op_4');
            $Question->r_op = $request->input('r_op');
            $Question->teacher_id = $request->input('teacher_id');
            $Question->teacher = $request->input('teacher');
    
    
            $Question->update();
            return redirect()->back();
        }
        return redirect()->intended('teacherlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function exams_status_update(Request $request,$id)
    {
        if(Auth::check())
        {
            $status = Exam::find($id);
        
            $status->status = $request->input('status');
    
            $status->update();
            return redirect()->back();
        }
        return redirect()->intended('teacherlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function question_delete($id)
    {
        if(Auth::check())
        {
            $question = Question::where('id', $id)->firstorfail()->delete();
            return redirect()->back();
        }
        return redirect()->intended('teacherlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function capture()
    {
        if(Auth::check())
        {
           
            return view('userdashboard.studentdashboard.face.capture');
        }
        return redirect()->intended('teacherlogin')->withSuccess('invalid','Opps! You do not have access');
    }
 
    public function capture2()
    {
        $email_id=Auth::user()->email;
        
        $dir1='C:/laragon/www/Online_Examination_System/public/uploads/users/'.$email_id.'.jpeg';
        $dir2='C:/laragon/www/Online_Examination_System/public/uploads/users/'.$email_id.'.png';
        $dir3='C:/laragon/www/Online_Examination_System/public/uploads/users/'.$email_id.'.jpg';
        $folderPath = "C:/laragon/www/Online_Examination_System/public/uploads/users/";
        $fileName = 'db_img'. '.jpeg';
        $file = $folderPath . $fileName;
        try {
        file_get_contents($dir1);
        file_put_contents($file,file_get_contents($dir1));
        }
        catch (Exception $e){
        try{
        file_get_contents($dir2);
        file_put_contents($file,file_get_contents($dir2));}
        catch (Exception $w){
            file_put_contents($file,file_get_contents($dir3));}}
        return view('userdashboard.studentdashboard.face.capture');
}   

    public function upload()
    {
        
        $img = $_POST['image'];
        $folderPath = "C:/laragon/www/Online_Examination_System/public/uploads/users/";
      
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
      
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = 'wb_img'. '.jpeg';
      
        $file = $folderPath . $fileName;
        file_put_contents($file, $image_base64);
    
     
        exec('python C:/laragon/www/Online_Examination_System/hello.py', $output, $ret_code);
        if($ret_code==1)
        {
            $exam = DB::table('exams')->where('is_admin','=','1')->where('department','=',Auth::user()->department)->get();
            $result1 = DB::table('results')->where('results.user_id','=',Auth::user()->id)->where('results.exam_name','=','Cryptography CA2')->count();
            $result2 = DB::table('results')->where('results.user_id','=',Auth::user()->id)->where('results.exam_name','=','E-comerce CA2')->count();
            $result3 = DB::table('results')->where('results.user_id','=',Auth::user()->id)->where('results.exam_name','=','Cyber Law CA2')->count();
            $result4 = DB::table('results')->where('results.user_id','=',Auth::user()->id)->where('results.exam_name','=','Robotics CA4')->count();
            $question = DB::table('questions')->where('questions.exam_id','=','1')->get();
            $publish = DB::table('results')->where('results.user_id','=',Auth::user()->id)->where('results.exam_id','=','1')->get();
            $data = DB::table('images')->where('user_id',Auth::user()->id)->get();
            return view('userdashboard.studentdashboard.studentexam.student_exam',compact('exam','result1','result2','result3','result4','publish','question','data'));
        }
        elseif($ret_code==0)
        echo "<h1>Login denied</h1>";
        elseif($ret_code==2)
        echo "<h1>Multiple faces detected</h1>";
        elseif($ret_code==4)
        {
        echo "<h1>Please look straight into the camera</h1>";
        return view('userdashboard.studentdashboard.face.capture');
        }
        else 
        echo "<h1>No face detected or image Unclear</h1>";
    }

    public function studentexam()
    {
        if(Auth::check())
        {
            $exam = DB::table('exams')->where('is_admin','=','1')->where('department','=',Auth::user()->department)->get();
            $result1 = DB::table('results')->where('results.user_id','=',Auth::user()->id)->where('results.exam_name','=','Cryptography CA2')->count();
            $result2 = DB::table('results')->where('results.user_id','=',Auth::user()->id)->where('results.exam_name','=','E-comerce CA2')->count();
            $result3 = DB::table('results')->where('results.user_id','=',Auth::user()->id)->where('results.exam_name','=','Cyber Law CA2')->count();
            $result4 = DB::table('results')->where('results.user_id','=',Auth::user()->id)->where('results.exam_name','=','Robotics CA4')->count();
    
            $question = DB::table('questions')->where('questions.exam_id','=','1')->get();
            $publish = DB::table('results')->where('results.user_id','=',Auth::user()->id)->where('results.exam_id','=','1')->get();
            $data = DB::table('images')->where('user_id',Auth::user()->id)->get();
            return view('userdashboard.studentdashboard.studentexam.student_exam',compact('exam','result1','result2','result3','result4','publish','question','data'));
        }
        return redirect()->intended('studentlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function startexam($id)
    {
        if(Auth::check())
        {
            $exam = Exam::find($id)->where('id',$id)->get();
            $exam1 = Exam::find($id)->where('id',$id)->get();
            $exam2 = Exam::find($id)->where('id',$id)->get();
            $exam3 = Exam::find($id)->where('id',$id)->get();
            $exam4 = Exam::find($id)->where('id',$id)->get();
            $time1 = Exam::where('id',$id)->where('is_admin','1')->get();
            $ques1 = Question::where('exam_id',$id)->where('id', '1')->get();
            $ques2 = Question::where('exam_id',$id)->where('id', '2')->get();
            $ques3 = Question::where('exam_id',$id)->where('id', '3')->get();
            $ques4 = Question::where('exam_id',$id)->where('id', '4')->get();
            $ques5 = Question::where('exam_id',$id)->where('id', '5')->get();
            $ques6 = Question::where('exam_id',$id)->where('id', '6')->get();
            $ques7 = Question::where('exam_id',$id)->where('id', '7')->get();
            $ques8 = Question::where('exam_id',$id)->where('id', '8')->get();
            $ques9 = Question::where('exam_id',$id)->where('id', '9')->get();
            $ques10 = Question::where('exam_id',$id)->where('id', '10')->get();
            $ques11 = Question::where('exam_id',$id)->where('id', '11')->get();
            $ques12 = Question::where('exam_id',$id)->where('id', '12')->get();
            $ques13 = Question::where('exam_id',$id)->where('id', '13')->get();
            $ques14 = Question::where('exam_id',$id)->where('id', '14')->get();
            $ques15 = Question::where('exam_id',$id)->where('id', '15')->get();
            $ques16 = Question::where('exam_id',$id)->where('id', '16')->get();
            $ques17 = Question::where('exam_id',$id)->where('id', '17')->get();
            $ques18 = Question::where('exam_id',$id)->where('id', '18')->get();
            $ques19 = Question::where('exam_id',$id)->where('id', '19')->get();
            $ques20 = Question::where('exam_id',$id)->where('id', '20')->get();
            $ques21 = Question::where('exam_id',$id)->where('id', '21')->get();
            $ques22 = Question::where('exam_id',$id)->where('id', '22')->get();
            $ques23 = Question::where('exam_id',$id)->where('id', '23')->get();
            $ques24 = Question::where('exam_id',$id)->where('id', '24')->get();
            $ques25 = Question::where('exam_id',$id)->where('id', '25')->get();

            $ques26 = Question::where('exam_id',$id)->where('id', '26')->get();
            $ques27 = Question::where('exam_id',$id)->where('id', '27')->get();
            $ques28 = Question::where('exam_id',$id)->where('id', '28')->get();
            $ques29 = Question::where('exam_id',$id)->where('id', '29')->get();
            $ques30 = Question::where('exam_id',$id)->where('id', '30')->get();
            $ques31 = Question::where('exam_id',$id)->where('id', '31')->get();
            $ques32 = Question::where('exam_id',$id)->where('id', '32')->get();
            $ques33 = Question::where('exam_id',$id)->where('id', '33')->get();
            $ques34 = Question::where('exam_id',$id)->where('id', '34')->get();
            $ques35 = Question::where('exam_id',$id)->where('id', '35')->get();
            $ques36 = Question::where('exam_id',$id)->where('id', '36')->get();
            $ques37 = Question::where('exam_id',$id)->where('id', '37')->get();
            $ques38 = Question::where('exam_id',$id)->where('id', '38')->get();
            $ques39 = Question::where('exam_id',$id)->where('id', '39')->get();
            $ques40 = Question::where('exam_id',$id)->where('id', '40')->get();
            $ques41 = Question::where('exam_id',$id)->where('id', '41')->get();
            $ques42 = Question::where('exam_id',$id)->where('id', '42')->get();
            $ques43 = Question::where('exam_id',$id)->where('id', '43')->get();
            $ques44 = Question::where('exam_id',$id)->where('id', '44')->get();
            $ques45 = Question::where('exam_id',$id)->where('id', '45')->get();
            $ques46 = Question::where('exam_id',$id)->where('id', '46')->get();
            $ques47 = Question::where('exam_id',$id)->where('id', '47')->get();
            $ques48 = Question::where('exam_id',$id)->where('id', '48')->get();
            $ques49 = Question::where('exam_id',$id)->where('id', '49')->get();
            $ques50 = Question::where('exam_id',$id)->where('id', '50')->get();

            $ques51 = Question::where('exam_id',$id)->where('id', '51')->get();
            $ques52 = Question::where('exam_id',$id)->where('id', '52')->get();
            $ques53 = Question::where('exam_id',$id)->where('id', '53')->get();
            $ques54 = Question::where('exam_id',$id)->where('id', '54')->get();
            $ques55 = Question::where('exam_id',$id)->where('id', '55')->get();
            $ques56 = Question::where('exam_id',$id)->where('id', '56')->get();
            $ques57 = Question::where('exam_id',$id)->where('id', '57')->get();
            $ques58 = Question::where('exam_id',$id)->where('id', '58')->get();
            $ques59 = Question::where('exam_id',$id)->where('id', '59')->get();
            $ques60 = Question::where('exam_id',$id)->where('id', '60')->get();
            $ques61 = Question::where('exam_id',$id)->where('id', '61')->get();
            $ques62 = Question::where('exam_id',$id)->where('id', '62')->get();
            $ques63 = Question::where('exam_id',$id)->where('id', '63')->get();
            $ques64 = Question::where('exam_id',$id)->where('id', '64')->get();
            $ques65 = Question::where('exam_id',$id)->where('id', '65')->get();
            $ques66 = Question::where('exam_id',$id)->where('id', '66')->get();
            $ques67 = Question::where('exam_id',$id)->where('id', '67')->get();
            $ques68 = Question::where('exam_id',$id)->where('id', '68')->get();
            $ques69 = Question::where('exam_id',$id)->where('id', '69')->get();
            $ques70 = Question::where('exam_id',$id)->where('id', '70')->get();
            $ques71 = Question::where('exam_id',$id)->where('id', '71')->get();
            $ques72 = Question::where('exam_id',$id)->where('id', '72')->get();
            $ques73 = Question::where('exam_id',$id)->where('id', '73')->get();
            $ques74 = Question::where('exam_id',$id)->where('id', '74')->get();
            $ques75 = Question::where('exam_id',$id)->where('id', '75')->get();

            $ques76 = Question::where('exam_id',$id)->where('id', '76')->get();
            $ques77 = Question::where('exam_id',$id)->where('id', '77')->get();
            $ques78 = Question::where('exam_id',$id)->where('id', '78')->get();
            $ques79 = Question::where('exam_id',$id)->where('id', '79')->get();
            $ques80 = Question::where('exam_id',$id)->where('id', '80')->get();
            $ques81 = Question::where('exam_id',$id)->where('id', '81')->get();
            $ques82 = Question::where('exam_id',$id)->where('id', '82')->get();
            $ques83 = Question::where('exam_id',$id)->where('id', '83')->get();
            $ques84 = Question::where('exam_id',$id)->where('id', '84')->get();
            $ques85 = Question::where('exam_id',$id)->where('id', '85')->get();
            $ques86 = Question::where('exam_id',$id)->where('id', '86')->get();
            $ques87 = Question::where('exam_id',$id)->where('id', '87')->get();
            $ques88 = Question::where('exam_id',$id)->where('id', '88')->get();
            $ques89 = Question::where('exam_id',$id)->where('id', '89')->get();
            $ques90 = Question::where('exam_id',$id)->where('id', '90')->get();
            $ques91 = Question::where('exam_id',$id)->where('id', '91')->get();
            $ques92 = Question::where('exam_id',$id)->where('id', '92')->get();
            $ques93 = Question::where('exam_id',$id)->where('id', '93')->get();
            $ques94 = Question::where('exam_id',$id)->where('id', '94')->get();
            $ques95 = Question::where('exam_id',$id)->where('id', '95')->get();
            $ques96 = Question::where('exam_id',$id)->where('id', '96')->get();
            $ques97 = Question::where('exam_id',$id)->where('id', '97')->get();
            $ques98 = Question::where('exam_id',$id)->where('id', '98')->get();
            $ques99 = Question::where('exam_id',$id)->where('id', '99')->get();
            $ques100 = Question::where('exam_id',$id)->where('id','100')->get();
            $i=1;
            return view('userdashboard.studentdashboard.studentexam.exam',
                        compact('exam','exam1','exam2','exam3','exam4','time1','ques1','ques2','ques3','ques4','ques5','ques6','ques7','ques8','ques9','ques10','ques11',
                                'ques12','ques13','ques14','ques15','ques16','ques17','ques18','ques19','ques20','ques21','ques22',
                                'ques23','ques24','ques25','ques26','ques27','ques28','ques29','ques30','ques31','ques32','ques33',
                                'ques34','ques35','ques36','ques37','ques38','ques39','ques40','ques41','ques42','ques43','ques44',
                                'ques45','ques46','ques47','ques48','ques49','ques50','ques51','ques52','ques53','ques54','ques55',
                                'ques56','ques57','ques58','ques59','ques60','ques61','ques62','ques63','ques64','ques65','ques66',
                                'ques67','ques68','ques69','ques70','ques71','ques72','ques73','ques74','ques75','ques76','ques77',
                                'ques78','ques79','ques80','ques81','ques82','ques83','ques84','ques85','ques86','ques87','ques88',
                                'ques89','ques90','ques91','ques92','ques93','ques94','ques95','ques96','ques97','ques98','ques99',
                                'ques100','i'));
        }
        return redirect()->intended('studentlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function result_store(Request $request)
    {
        if(Auth::check())
        {
            $result = new Result;

            $result->user_id = $request->input('user_id');
            $result->name = $request->input('name');
            $result->exam_id = $request->input('exam_id');
            $result->exam_name = $request->input('exam_name');
            $result->q1 = $request->input('q1');
            $result->q2 = $request->input('q2');
            $result->q3 = $request->input('q3');
            $result->q4 = $request->input('q4');
            $result->q5 = $request->input('q5');
            $result->q6 = $request->input('q6');
            $result->q7 = $request->input('q7');
            $result->q8 = $request->input('q8');
            $result->q9 = $request->input('q9');
            $result->q10 = $request->input('q10');
            $result->q11 = $request->input('q11');
            $result->q12 = $request->input('q12');
            $result->q13 = $request->input('q13');
            $result->q14 = $request->input('q14');
            $result->q15 = $request->input('q15');
            $result->q16 = $request->input('q16');
            $result->q17 = $request->input('q17');
            $result->q18 = $request->input('q18');
            $result->q19 = $request->input('q19');
            $result->q20 = $request->input('q20');
            $result->q21 = $request->input('q21');
            $result->q22 = $request->input('q22');
            $result->q23 = $request->input('q23');
            $result->q24 = $request->input('q24');
            $result->q25 = $request->input('q25');
            $result->save();
    
            return redirect('stu')->with('complete');
        }
        return redirect()->intended('studentlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function studentresult()
    {
        if(Auth::check())
        {
            $result1 = DB::table('results')->where('results.user_id','=',Auth::user()->id)->where('results.exam_name','=','Cryptography CA2')->count();
            $result2 = DB::table('results')->where('results.user_id','=',Auth::user()->id)->where('results.exam_name','=','E-comerce CA2')->count();
            $result3 = DB::table('results')->where('results.user_id','=',Auth::user()->id)->where('results.exam_name','=','Cyber Law CA2')->count();
            $result4 = DB::table('results')->where('results.user_id','=',Auth::user()->id)->where('results.exam_name','=','Robotics CA4')->count();
            $data = DB::table('images')->where('user_id',Auth::user()->id)->get();
            $exam = Exam::where('is_admin','=','1')->where('department','=',Auth::user()->department)->get();
            return view('userdashboard.studentdashboard.studentresult.studentresult',compact('data','exam','result1','result2','result3','result4'));
        }
        return redirect()->intended('studentlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function sturesultview($id)
    {
        if(Auth::check())
        {
            $que1 = Question::where('id','=','1')->get();
            $que2 = Question::where('id','=','2')->get();
            $que3 = Question::where('id','=','3')->get();
            $que4 = Question::where('id','=','4')->get();
            $que5 = Question::where('id','=','5')->get();
            $que6 = Question::where('id','=','6')->get();
            $que7 = Question::where('id','=','7')->get();
            $que8 = Question::where('id','=','8')->get();
            $que9 = Question::where('id','=','9')->get();
            $que10 = Question::where('id','=','10')->get();
            $que11 = Question::where('id','=','11')->get();
            $que12 = Question::where('id','=','12')->get();
            $que13 = Question::where('id','=','13')->get();
            $que14 = Question::where('id','=','14')->get();
            $que15 = Question::where('id','=','15')->get();
            $que16 = Question::where('id','=','16')->get();
            $que17 = Question::where('id','=','17')->get();
            $que18 = Question::where('id','=','18')->get();
            $que19 = Question::where('id','=','19')->get();
            $que20 = Question::where('id','=','20')->get();
            $que21 = Question::where('id','=','21')->get();
            $que22 = Question::where('id','=','22')->get();
            $que23 = Question::where('id','=','23')->get();
            $que24 = Question::where('id','=','24')->get();
            $que25 = Question::where('id','=','25')->get();
            $result1 = DB::table('results')->where('user_id',Auth::user()->id)->get();
            $result2 = DB::table('results')->where('user_id',Auth::user()->id)->get();
            $result3 = DB::table('results')->where('user_id',Auth::user()->id)->get();
            $result4 = DB::table('results')->where('user_id',Auth::user()->id)->get();
            $result5 = DB::table('results')->where('user_id',Auth::user()->id)->get();
            $result6 = DB::table('results')->where('user_id',Auth::user()->id)->get();
            $result7 = DB::table('results')->where('user_id',Auth::user()->id)->get();
            $result8 = DB::table('results')->where('user_id',Auth::user()->id)->get();
            $result9 = DB::table('results')->where('user_id',Auth::user()->id)->get();
            $result10 = DB::table('results')->where('user_id',Auth::user()->id)->get();
            $result11 = DB::table('results')->where('user_id',Auth::user()->id)->get();
            $result12 = DB::table('results')->where('user_id',Auth::user()->id)->get();
            $result13 = DB::table('results')->where('user_id',Auth::user()->id)->get();
            $result14 = DB::table('results')->where('user_id',Auth::user()->id)->get();
            $result15 = DB::table('results')->where('user_id',Auth::user()->id)->get();
            $result16 = DB::table('results')->where('user_id',Auth::user()->id)->get();
            $result17 = DB::table('results')->where('user_id',Auth::user()->id)->get();
            $result18 = DB::table('results')->where('user_id',Auth::user()->id)->get();
            $result19 = DB::table('results')->where('user_id',Auth::user()->id)->get();
            $result20 = DB::table('results')->where('user_id',Auth::user()->id)->get();
            $result21 = DB::table('results')->where('user_id',Auth::user()->id)->get();
            $result22 = DB::table('results')->where('user_id',Auth::user()->id)->get();
            $result23 = DB::table('results')->where('user_id',Auth::user()->id)->get();
            $result24 = DB::table('results')->where('user_id',Auth::user()->id)->get();
            $result25 = DB::table('results')->where('user_id',Auth::user()->id)->get();
            $exam = Exam::find($id)->where('id',$id)->get();
            $data = DB::table('images')->where('user_id',Auth::user()->id)->get();
            return view('userdashboard.studentdashboard.studentresult.resultview',compact('data','exam','que1','que2','que3',
                        'que4','que5','que6','que7','que8','que9','que10','que11','que12','que13','que14','que15','que15',
                        'que16','que17','que18','que19','que20','que21','que22','que23','que24','que25','result1','result2',
                        'result3','result4','result5','result6','result7','result8','result9','result10','result11','result12',
                        'result13','result14','result15','result16','result17','result18','result19','result20','result21',
                        'result22','result23','result24','result25'));
        }
        return redirect()->intended('studentlogin')->withSuccess('invalid','Opps! You do not have access');
    }
    // public function home()
    // {
    //     return view('home');
    // }

    // public function teacherlogin()
    // {
    //     return view('userlogin.teacherlogin');
    // }

    // public function teacherregistration()
    // {
    //     return view('userregistration.teacherregistration');
    // }

    // public function postLogin(Request $request)
    // {
    //     $errors = new MessageBag; 

    //     $request->validate([
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);
   
    //     $credentials = $request->only('email', 'password');
    //     if (Auth::attempt($credentials)) 
    //     {
    //         // return redirect()->intended('teacherdashboard')
    //         //             ->withSuccess('You have Successfully loggedin as Teacher');

    //         if(auth()->check() && auth()->user()->is_admin == 1)
    //         {
    //             return redirect()->intended('admindashboard')->withSuccess('You have Successfully loggedin as Admin');
    //         }
    //         if(auth()->check() && auth()->teacher()->is_admin == 2)
    //         {
    //             return redirect()->intended('teacherdashboard')->withSuccess('You have Successfully loggedin as Teacher');
    //         }
    //         if(auth()->check() && auth()->user()->is_admin == 0)
    //         {
    //             return redirect()->intended('studentdashboard')->withSuccess('You have Successfully loggedin as Student');
    //         }
    //     }

    //    // return redirect()->intended('adminlogin')->withErrors('Opps! You entered invalid credentials');
    //    else
    //        $errors = new MessageBag(['password' => ['Email or password invalid.']]); 
    //        return redirect()->back()->withErrors($errors);
    // }
      

    // public function postRegistration(Request $request)
    // {  
    //     $request->validate([
    //         'name' => 'required',
    //         'institution' => 'required',
    //         'email' => 'required|email|unique:teachers',
    //         'password' => 'required|min:6',
    //     ]);
           
    //     $data = $request->all();
    //     $check = $this->create($data);

    //     return redirect('stu')->with('message');

    // }

    // public function create(array $data)
    // {
    //   return Teacher::create([
    //     'name' => $data['name'],
    //     'institution' => $data['institution'],
    //     'email' => $data['email'],
    //     'password' => Hash::make($data['password'])
    //   ]);
    // }

    // public function teacherdashboard()
    // {
    //     if(Auth::check()){
    //         return view('userdashboard.teacherdashboard');
    //     }
  
    //     return redirect()->intended('teacherlogin')->withSuccess('invalid','Opps! You do not have access');
    // }

    // public function logout() 
    // {
    //     Session::flush();
    //     Auth::logout();
    //     return Redirect('home');
    // }
}

?>