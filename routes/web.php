<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () 
{
    return view('homeindex');
});



Route::get('home', [App\Http\Controllers\Auth\AuthController::class, 'home'])->name('home');

Route::get('feature_s', [App\Http\Controllers\Auth\AuthController::class, 'features'])->name('features');

Route::get('about_us', [App\Http\Controllers\Auth\AuthController::class, 'aboutus'])->name('about');

Route::get('contact_us', [App\Http\Controllers\Auth\AuthController::class, 'contactus'])->name('contact');

// Route::get('home', [App\Http\Controllers\StudentController::class, 'home']);
// Route::get('home', [App\Http\Controllers\TeacherController::class, 'home']);
// Route::get('home', [App\Http\Controllers\AdminController::class, 'home']);

Route::get('login', [App\Http\Controllers\Auth\AuthController::class, 'index'])->name('login');

Route::get('studentlogin', [App\Http\Controllers\Auth\AuthController::class, 'studentlogin'])->name('student_login');
// Route::get('studentlogin', [App\Http\Controllers\StudentController::class, 'studentlogin'])->name('student_login');

Route::get('teacherlogin', [App\Http\Controllers\Auth\AuthController::class, 'teacherlogin'])->name('teacher_login');
// Route::get('teacherlogin', [App\Http\Controllers\TeacherController::class, 'teacherlogin'])->name('teacher_login');

Route::get('adminlogin', [App\Http\Controllers\Auth\AuthController::class, 'adminlogin'])->name('admin_login');
// Route::get('adminlogin', [App\Http\Controllers\AdminController::class, 'adminlogin'])->name('admin_login');

Route::post('post-login', [App\Http\Controllers\Auth\AuthController::class, 'postLogin'])->name('login.post'); 
// Route::post('student-post-login', [App\Http\Controllers\StudentController::class, 'postLogin'])->name('studentlogin.post');
// Route::post('post-login', [App\Http\Controllers\TeacherController::class, 'postLogin'])->name('login.post');
// Route::post('post-login', [App\Http\Controllers\AdminController::class, 'postLogin'])->name('login.post');

Route::get('registration', [App\Http\Controllers\Auth\AuthController::class, 'registration'])->name('register');

Route::get('studentregistration', [App\Http\Controllers\Auth\AuthController::class, 'studentregistration'])->name('studentregister');
// Route::get('studentregistration', [App\Http\Controllers\StudentController::class, 'studentregistration'])->name('studentregister');

Route::get('tacherregistration', [App\Http\Controllers\Auth\AuthController::class, 'teacherregistration'])->name('teacherregister');
// Route::get('tacherregistration', [App\Http\Controllers\TeacherController::class, 'teacherregistration'])->name('teacherregister');

Route::get('adminregistration', [App\Http\Controllers\Auth\AuthController::class, 'adminregistration'])->name('adminregister');
// Route::get('adminregistration', [App\Http\Controllers\AdminController::class, 'adminregistration'])->name('adminregister');

Route::post('post-registration', [App\Http\Controllers\Auth\AuthController::class, 'postRegistration'])->name('register.post'); 
// Route::post('post-registration', [App\Http\Controllers\StudentController::class, 'postRegistration'])->name('register.post');
// Route::post('post-registration', [App\Http\Controllers\TeacherController::class, 'postRegistration'])->name('register.post');
// Route::post('post-registration', [App\Http\Controllers\AdminController::class, 'postRegistration'])->name('register.post');

 
// Route::get('admindashboard', [App\Http\Controllers\AdminController::class, 'admindashboard']);

// Route::get('Student/Profile', [App\Http\Controllers\StudentController::class, 'Profile'])->name('Student_Profile');

// Route::get('teacher_profile', [App\Http\Controllers\Auth\AuthController::class, 'teacherprofile'])->name('teacher_profile');

// Route::get('teacherdashboard', [App\Http\Controllers\TeacherController::class, 'teacherdashboard']);

Route::get('dashboard', [App\Http\Controllers\Auth\AuthController::class, 'dashboard']);

Route::group(['middleware'=>'disable_back_btn'],function(){
        Route::get('studentdashboard', [App\Http\Controllers\Auth\AuthController::class, 'studentdashboard'])->name('student_dashboard');
        Route::get('student_profilee', [App\Http\Controllers\ImageController::class, 'index'])->name('stu_profile');
        Route::post('student_profilee', [App\Http\Controllers\ImageController::class, 'store'])->name('student_profilee');
        Route::get('student_subject', [App\Http\Controllers\TeacherController::class, 'studentsubject'])->name('student_subject');
        Route::get('student_class', [App\Http\Controllers\TeacherController::class, 'studentclass'])->name('student_class');
        Route::post('result_store' , [App\Http\Controllers\TeacherController::class, 'result_store'])->name('result_store');
        Route::put('student_image_update/{id}',[App\Http\Controllers\ImageController::class, 'stu_image_update']);
        Route::put('update_student_data/{id}',[App\Http\Controllers\ImageController::class, 'update'])->name('update_student_data/{id}');
        Route::get('student_exam', [App\Http\Controllers\TeacherController::class, 'studentexam'])->name('student_exam');
        Route::get('capture', [App\Http\Controllers\TeacherController::class, 'capture2'])->name('student_capture');
        Route::post('upload',[App\Http\Controllers\TeacherController::class,'upload'])->name('student_upload');
        Route::get('student_result', [App\Http\Controllers\TeacherController::class, 'studentresult'])->name('student_result');
        Route::get('student_result_view/{id}', [App\Http\Controllers\TeacherController::class, 'sturesultview']);
        Route::get('start_exam/{id}', [App\Http\Controllers\TeacherController::class, 'startexam']);

});

Route::group(['middleware'=>'disable_back_btn'],function(){
    Route::get('teacherdashboard', [App\Http\Controllers\Auth\AuthController::class, 'teacherdashboard'])->name('teacher_dashboard'); 
    Route::get('teacher_profilee', [App\Http\Controllers\ImageController::class, 'tea_index'])->name('tea_profile');
    Route::post('teacher_profilee', [App\Http\Controllers\ImageController::class, 'tea_store'])->name('teacher_profilee');
    Route::put('tea_image_update/{id}',[App\Http\Controllers\ImageController::class, 'tea_image_update']);
    Route::put('update_teacher_data/{id}',[App\Http\Controllers\ImageController::class, 'tea_update'])->name('update_teacher_data/{id}');
    Route::get('teacher_subject', [App\Http\Controllers\TeacherController::class, 'teachersubject'])->name('teacher_subject');
    Route::get('teacher_class', [App\Http\Controllers\TeacherController::class, 'teacherclass'])->name('teacher_class');
    Route::get('teacher_student_profile', [App\Http\Controllers\TeacherController::class, 'teacherstudent'])->name('teacher_student');
    Route::get('teacher_exam', [App\Http\Controllers\TeacherController::class, 'teacherexam'])->name('teacher_exam');
    Route::post('teacher_question', [App\Http\Controllers\TeacherController::class, 'teacherquestion'])->name('teacher_question');
    Route::get('question_delete/{id}',[App\Http\Controllers\TeacherController::class, 'question_delete']);
    Route::put('update_question_data/{id}',[App\Http\Controllers\TeacherController::class, 'question_data_update']);
    Route::put('update_exams_status/{id}',[App\Http\Controllers\TeacherController::class, 'exams_status_update']);
});

Route::group(['middleware'=>'disable_back_btn'],function(){
    Route::get('admindashboard', [App\Http\Controllers\Auth\AuthController::class, 'admindashboard'])->name('admin');
    Route::get('admin-profile', [App\Http\Controllers\ImageController::class, 'adminprofile'])->name('admin_profile');
    Route::post('admin_profilee', [App\Http\Controllers\ImageController::class, 'admin_store'])->name('admin_profilee');
    Route::put('admin_image_update/{id}',[App\Http\Controllers\ImageController::class, 'admin_image_update']);
    Route::put('update_admin_data/{id}',[App\Http\Controllers\ImageController::class, 'admin_update'])->name('update_admin_data/{id}');
    Route::get('admin-class', [App\Http\Controllers\Auth\AuthController::class, 'admin_class_dashboard'])->name('admin_class');
    Route::get('admin_subject_view', [App\Http\Controllers\SubjectController::class, 'adminsubject'])->name('adminsubject');
    Route::post('admin_subject', [App\Http\Controllers\SubjectController::class, 'subject_store']);
    Route::put('update_subject_data/{id}',[App\Http\Controllers\SubjectController::class, 'subject_update'])->name('update_subject_data/{id}');
    Route::get('subject_delete/{id}',[App\Http\Controllers\SubjectController::class, 'subject_delete']);
    Route::get('admin-student', [App\Http\Controllers\Auth\AuthController::class, 'admin_student_dashboard'])->name('admin_stu');
    Route::get('admin-techer', [App\Http\Controllers\Auth\AuthController::class, 'admin_teacher_dashboard'])->name('admin_tea');
    Route::put('update_student_role/{id}',[App\Http\Controllers\ImageController::class, 'stu_role_update'])->name('update_student_role/{id}');
    Route::get('stu_delete/{id}',[App\Http\Controllers\ImageController::class, 'stu_delete']);
    Route::put('update_teacher_role/{id}',[App\Http\Controllers\ImageController::class, 'tea_role_update'])->name('update_teacher_role/{id}');
    Route::get('tea_delete/{id}',[App\Http\Controllers\ImageController::class, 'tea_delete']);
    Route::get('admin_exam', [App\Http\Controllers\ExamController::class, 'adminexam'])->name('admin_exam');
    Route::post('admin_exam', [App\Http\Controllers\ExamController::class, 'store'])->name('admin_exam');
    Route::put('update_exam_data/{id}',[App\Http\Controllers\ExamController::class, 'exam_data_update']);
    Route::get('exam_delete/{id}',[App\Http\Controllers\ExamController::class, 'exam_delete']);
});



Route::get('logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');
Route::get('stu_logout', [App\Http\Controllers\Auth\AuthController::class, 'stulogout'])->name('stulogout');
Route::get('tea_logout', [App\Http\Controllers\Auth\AuthController::class, 'tealogout'])->name('tealogout');
Route::get('admin_logout', [App\Http\Controllers\Auth\AuthController::class, 'adminlogout'])->name('adminlogout');

 
Route::get('forgot_password',[App\Http\Controllers\ForgotPassword::class, 'forgot'])->name('forgot_password');
Route::post('forgot_password',[App\Http\Controllers\ForgotPassword::class, 'passwordreset'])->name('forgot_password');

Route::get('about', function () 
{
    return view('about');
});

Route::get('/stu', function () 
{
    return view('pop_up_message');
});

Route::get('/submit', function () 
{
    return view('submit');
});

Route::get('/submit1', function () 
{
    return view('userdashboard.studentdashboard.studentdashboard');
});

Route::get('/stu1', function () 
{
    return view('homeindex');
});


Route::get('/exe', function () 
{
    return view('example');
});

Route::get('/demo', function () 
{
    return view('Demo');
});

Route::get('/ami', function () 
{
    $img =  Auth::user()->get();
    $kk = $img->pluck('email');
    dd($kk);
});

Route::get('/kpk',function()
{
    return view('home');
});

Route::get('/profile', function () 
{
    return view('userdashboard.studentdashboard');
});