<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Models\Subject;
use App\Models\Image;
use Hash;
use Mail;
use DB;
use Illuminate\Support\MessageBag;
  
class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     * 
     * 
     * 
     */


     public function index2()
     {
         $data=['name'=>"Subhadip Rakshit",'data'=>" You Successfully  Cleared for Wipro Accessment . Your Interview will Start
                           on Monday at 3:35PM ."];
         $user['to']='code.blogs.123@gmail.com';
         Mail::send('mail',$data,function($messages) use ($user)
         {
             $messages->to($user['to']);
             $messages->subject('Completion of Assesment !!!');
         });
     }

    public function home()
    {
        return view('homeindex');
    }

    public function aboutus()
    {
        return view('about');
    }

    public function contactus()
    {
        return view('contact');
    }

    public function features()
    {
        return view('features');
    }

    public function index()
    {
        // if(auth()->check() && auth()->user()->is_admin == 1)
        // {
        //     return view('users.admindashboard');
        // }
        return view('auth.login');
    }  

    public function studentlogin()
    {
        return view('userlogin.studentlogin');
    }

    public function teacherlogin()
    {
        return view('userlogin.teacherlogin');
    }

    public function adminlogin()
    {
        return view('userlogin.adminlogin');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
       return view('auth.registration');
    }

    public function studentregistration()
    {
        return view('userregistration.studentregistration');
    }
      
    public function teacherregistration()
    {
        return view('userregistration.teacherregistration');
    }

    public function adminregistration()
    {
        return view('userregistration.adminregistration');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */ 
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
            if(auth()->check() && auth()->user()->is_admin == 2)
            {
                return redirect()->intended('admindashboard')->withSuccess('You have Successfully loggedin as Admin');
            }
            if(auth()->check() && auth()->user()->is_admin == 1)
            {
                return redirect()->intended('teacherdashboard')->withSuccess('You have Successfully loggedin as Teacher');
            }
            if(auth()->check() && auth()->user()->is_admin == 0)
            {
                return redirect()->intended('studentdashboard')->withSuccess('You have Successfully loggedin as Student');
            }
        }
       else
           $errors = new MessageBag(['password' => ['Invalid Email or Password']]); 
           return redirect()->back()->withErrors($errors);
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'mobile' => 'required',
            'department' => 'required',
            'year' => 'required',
            'semester' => 'required',
            'roll' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);

        return redirect('stu')->with('message');

    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function admindashboard()
    {
        if(Auth::check())
        {
            $students = User::where('is_admin','0')->count();
            $teachers = User::where('is_admin','1')->count();
            $subjects = Subject::where('is_admin','1')->count(); 

            $class = User::distinct('department','year','semester')->where('is_admin','=','0')->count();
            $exams = DB::table('exams')->where('is_admin','=','1')->get()->count();
            $data = DB::table('images')->where('user_id',Auth::user()->id)->get();
            return view('userdashboard.admindashboard',compact('students','teachers','subjects','class','exams','data'));
        }
   
        return redirect()->intended('adminlogin')->withSuccess('invalid','Opps! You do not have access');
    }


    public function admin_student_dashboard()
    {
        if(Auth::check())
        {
            $data = DB::table('images')->where('user_id',Auth::user()->id)->get();
            $StudentShow = DB::table('users')->where('is_admin', '0')->get();
            $img = DB::table('images')->get();
            return view('userdashboard.admindashboard.admin_student',compact('StudentShow','img','data'));
        }
        return redirect()->intended('adminlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function admin_teacher_dashboard()
    {
        if(Auth::check())
        {
            $data = DB::table('images')->where('user_id',Auth::user()->id)->get();
            $StudentShow = DB::table('users')->where('is_admin', '1')->get();
            $img = DB::table('images')->get();
            return view('userdashboard.admindashboard.admin_teacher',compact('StudentShow','img','data'));
        }
        return redirect()->intended('adminlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function admin_class_dashboard()
    {
        if(Auth::check())
        {
            $iteight = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'IT')
                ->where('year', '=', '4th')
                ->where('semester', '=', '8th')
                ->get();
            
            $itseven = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'IT')
                ->where('year', '=', '4th')
                ->where('semester', '=', '7th')
                ->get();

            $itsix = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'IT')
                ->where('year', '=', '3rd')
                ->where('semester', '=', '6th')
                ->get();
            
            $itfive = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'IT')
                ->where('year', '=', '3rd')
                ->where('semester', '=', '5th')
                ->get();

            $itfour = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'IT')
                ->where('year', '=', '2nd')
                ->where('semester', '=', '4th')
                ->get();

            $itthree = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'IT')
                ->where('year', '=', '2nd')
                ->where('semester', '=', '3rd')
                ->get();

            $ittwo = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'IT')
                ->where('year', '=', '1st')
                ->where('semester', '=', '2nd')
                ->get();

            $itone = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'IT')
                ->where('year', '=', '1st')
                ->where('semester', '=', '1st')
                ->get();
                
            $cseeight = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'CSE')
                ->where('year', '=', '4th')
                ->where('semester', '=', '8th')
                ->get();
            
            $cseseven = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'CSE')
                ->where('year', '=', '4th')
                ->where('semester', '=', '7th')
                ->get();

            $csesix = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'CSE')
                ->where('year', '=', '3rd')
                ->where('semester', '=', '6th')
                ->get();
            
            $csefive = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'CSE')
                ->where('year', '=', '3rd')
                ->where('semester', '=', '5th')
                ->get();

            $csefour = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'CSE')
                ->where('year', '=', '2nd')
                ->where('semester', '=', '4th')
                ->get();

            $csethree = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'CSE')
                ->where('year', '=', '2nd')
                ->where('semester', '=', '3rd')
                ->get();

            $csetwo = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'CSE')
                ->where('year', '=', '1st')
                ->where('semester', '=', '2nd')
                ->get();

            $cseone = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'CSE')
                ->where('year', '=', '1st')
                ->where('semester', '=', '1st')
                ->get();

            $tteight = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'TT')
                ->where('year', '=', '4th')
                ->where('semester', '=', '8th')
                ->get();
            
            $ttseven = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'TT')
                ->where('year', '=', '4th')
                ->where('semester', '=', '7th')
                ->get();

            $ttsix = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'TT')
                ->where('year', '=', '3rd')
                ->where('semester', '=', '6th')
                ->get();
            
            $ttfive = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'TT')
                ->where('year', '=', '3rd')
                ->where('semester', '=', '5th')
                ->get();

            $ttfour = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'TT')
                ->where('year', '=', '2nd')
                ->where('semester', '=', '4th')
                ->get();

            $ttthree = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'TT')
                ->where('year', '=', '2nd')
                ->where('semester', '=', '3rd')
                ->get();

            $tttwo = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'TT')
                ->where('year', '=', '1st')
                ->where('semester', '=', '2nd')
                ->get();

            $ttone = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'TT')
                ->where('year', '=', '1st')
                ->where('semester', '=', '1st')
                ->get();

            $apmeight = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'APM')
                ->where('year', '=', '4th')
                ->where('semester', '=', '8th')
                ->get();
            
            $apmseven = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'APM')
                ->where('year', '=', '4th')
                ->where('semester', '=', '7th')
                ->get();

            $apmsix = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'APM')
                ->where('year', '=', '3rd')
                ->where('semester', '=', '6th')
                ->get();
            
            $apmfive = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'APM')
                ->where('year', '=', '3rd')
                ->where('semester', '=', '5th')
                ->get();

            $apmfour = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'APM')
                ->where('year', '=', '2nd')
                ->where('semester', '=', '4th')
                ->get();

            $apmthree = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'APM')
                ->where('year', '=', '2nd')
                ->where('semester', '=', '3rd')
                ->get();

            $apmtwo = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'APM')
                ->where('year', '=', '1st')
                ->where('semester', '=', '2nd')
                ->get();

            $apmone = User::select('*')
                ->where('is_admin', '=', '0')
                ->where('department', '=', 'APM')
                ->where('year', '=', '1st')
                ->where('semester', '=', '1st')
                ->get();
            $img = DB::table('images')->get();
            $data = DB::table('images')->where('user_id',Auth::user()->id)->get();
            return view('userdashboard.admindashboard.admin_class',compact('iteight','itseven','itsix','itfive','itfour',
                        'itthree','ittwo','itone','cseeight','cseseven','csesix','csefive','csefour','csethree','csetwo',
                        'cseone','tteight','ttseven','ttsix','ttfive','ttfour','ttthree','tttwo','ttone','apmeight','apmseven',
                        'apmsix','apmfive','apmfour','apmthree','apmtwo','apmone','data'));
        }
        return redirect()->intended('adminlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    // public function student_profile()
    // {
    //     if(Auth::check())
    //     {
    //         // $StudentShow = DB::table('users')->get();
    //         // return view('userdashboard.studentdashboard.student_profile',compact('StudentShow'));
    //     }
    // }

    public function teacherdashboard()
    {
        if(Auth::check())
        {
            $students = DB::table('subjects')->where('users.department','=',Auth::user()->department)
                ->where('subjects.teacher','=',Auth::user()->name)
                ->join('users', 'users.year', '=', 'subjects.year')
                ->where('users.is_admin','=','0')
                ->distinct('name')->count();

            $subjects = DB::table('subjects')->where('teacher','=',Auth::user()->name)->get('subject')->count();

            $class = DB::table('subjects')->where('teacher','=',Auth::user()->name)->get('year')->count();

            $exams = DB::table('exams')->where('teacher','=',Auth::user()->name)->get()->count();

            $data = DB::table('images')->where('user_id',Auth::user()->id)->get();

            return view('userdashboard.teacherdashboard',compact('students','subjects','class','exams','data'));
        }
  
        return redirect()->intended('teacherlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function teacherprofile()
    {
        if(Auth::check())
        {
            return view ('userdashboard.teacherdashboard.teacher_profile');
        }
        return redirect()->intended('teacherlogin')->withSuccess('invalid','Opps! You do not have access');
    }

    public function studentdashboard()
    {
       
        if(Auth::check()){
            $data = DB::table('images')->where('user_id',Auth::user()->id)->get();
            $subject= Subject::where('subjects.department', '=',Auth::user()->department)
                              ->where('subjects.year', '=',Auth::user()->year)
                              ->where('subjects.semester', '=',Auth::user()->semester)->count('subjects.subject');
            
            $exam = DB::table('exams')->where('is_admin','=','1')->where('department','=',Auth::user()->department)->count();
            return view('userdashboard.studentdashboard.studentdashboard',compact('data','subject','exam'));
        }
  
        return redirect()->intended('studentlogin')->withSuccess('invalid','Opps! You do not have access');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'mobile' => $data['mobile'],
        'department' => $data['department'],
        'year' => $data['year'],
        'semester' => $data['semester'],
        'address' => $data['address'],
        'dob' => $data['dob'],
        'roll' => $data['roll'],
        'password' => Hash::make($data['password'])
      ]);
    }

    
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() 
    {
        Session::flush();
        Auth::logout();
  
        return Redirect('home');
    }

    public function adminlogout() 
    {
        Session::flush();
        Auth::logout();
  
        return Redirect('adminlogin');
    }

    public function stulogout() 
    {
        Session::flush();
        Auth::logout();
  
        return Redirect('studentlogin');
    }

    public function tealogout() 
    {
        Session::flush();
        Auth::logout();
  
        return Redirect('studentlogin');
    }
}
