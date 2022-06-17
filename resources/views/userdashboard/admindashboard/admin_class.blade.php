<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Examination System</title>


    <link 
    rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="css/admin-class-style.css">

    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="containerr">
        <div class="navigation active">
            <ul>
                <li>
                    <a href="#" class="icon">
                        <span class="icon"><ion-icon name="school"></ion-icon></span>
                        <span class="title">Online Examination System</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin') }}" class="icon">
                        <span class="icon"><ion-icon name="grid-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin_profile') }}" class="icon">
                        <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                        <span class="title">Profile</span>
                    </a>
                </li>
                <li  class="clicked">
                    <a href="{{ route('admin_class') }}" class="icon">
                        <span class="icon"><ion-icon name="ribbon-outline"></ion-icon></span>
                        <span class="title">Class</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('adminsubject') }}" class="icon">
                        <span class="icon"><ion-icon name="documents-outline"></ion-icon></span>
                        <span class="title">Subject</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin_tea') }}" class="icon">
                        <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                        <span class="title">Teacher</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin_stu')}}" class="icon">
                        <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class="title">Student</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin_exam') }}" class="icon">
                        <span class="icon"><ion-icon name="calendar-outline"></ion-icon></span>
                        <span class="title">Exam</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="icon">
                        <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                        <span class="title">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('adminlogout') }}" class="icon">
                        <span class="icon"><ion-icon name="exit-outline"></ion-icon></span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- main -->
        <div class="main active">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <!-- Role -->
                <div class="role">
                    Hello Admin {{Auth::user()->name}}
                </div>
                <!-- userimg -->
                <div class="user">
                    @foreach($data as $change)
                        <div class="profile-img">
                            <img src="{{ asset('uploads/users/'.$change->image) }}" alt="Image" style="width : 35px ">
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- student -->
            <div class="class_management">
                <div class="class_management-header">
                    Class Management
                </div>
                <div class="class_header">
                    Information Technology
                </div>
                <div class="class1">
                    <div class="class_subheader" data-toggle="collapse" href="#it48" aria-expanded="true" aria-controls="it48">
                        <span class="department">Information Technology</span>
                        <span class="year">4th </span>Year <span class="semester">8th </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse show" id="it48">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            @foreach($iteight as $usereight)
                            <tr>
                                <td>{{$usereight->name}}</td>
                                <td>{{$usereight->roll}}</td>
                            </tr>
                            @endforeach
                            
                        </table>
                    </div>
                </div>
                <div class="class2">
                    <div class="class_subheader" data-toggle="collapse" href="#it47" aria-expanded="false" aria-controls="it48">
                        <span class="department">Information Technology</span>
                        <span class="year">4th </span>Year <span class="semester">7th </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="it47">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($itseven as $userseven)
                                <tr>
                                    <td>{{$userseven->name}}</td>
                                    <td>{{$userseven->roll}}</td>
                                </tr>
                                @endforeach
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="class3">
                    <div class="class_subheader" data-toggle="collapse" href="#it36" aria-expanded="false" aria-controls="it48">
                        <span class="department">Information Technology</span>
                        <span class="year">3rd </span>Year <span class="semester">6th </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="it36">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($itsix as $usersix)
                                    <tr>
                                        <td>{{$usersix->name}}</td>
                                        <td>{{$usersix->roll}}</td>
                                    </tr>
                                @endforeach
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="class4">
                    <div class="class_subheader" data-toggle="collapse" href="#it35" aria-expanded="false" aria-controls="it48">
                        <span class="department">Information Technology</span>
                        <span class="year">3rd </span>Year <span class="semester">5th </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="it35">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($itfive as $userfive)
                                    <tr>
                                        <td>{{$userfive->name}}</td>
                                        <td>{{$userfive->roll}}</td>
                                    </tr>
                                @endforeach
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="class5">
                    <div class="class_subheader" data-toggle="collapse" href="#it24" aria-expanded="false" aria-controls="it48">
                        <span class="department">Information Technology</span>
                        <span class="year">2nd </span>Year <span class="semester">4th </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="it24">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($itfour as $userfour)
                                    <tr>
                                        <td>{{$userfour->name}}</td>
                                        <td>{{$userfour->roll}}</td>
                                    </tr>
                                @endforeach
                            </tr>                     
                        </table>
                    </div>
                </div>
                <div class="class6">
                    <div class="class_subheader" data-toggle="collapse" href="#it23" aria-expanded="false" aria-controls="it48">
                        <span class="department">Information Technology</span>
                        <span class="year">2nd </span>Year <span class="semester">3rd </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="it23">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($itthree as $userthree)
                                    <tr>
                                        <td>{{$userthree->name}}</td>
                                        <td>{{$userthree->roll}}</td>
                                    </tr>
                                @endforeach
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="class7">
                    <div class="class_subheader" data-toggle="collapse" href="#it12" aria-expanded="false" aria-controls="it48">
                        <span class="department">Information Technology</span>
                        <span class="year">1st </span>Year <span class="semester">2nd </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="it12">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($ittwo as $usertwo)
                                    <tr>
                                        <td>{{$usertwo->name}}</td>
                                        <td>{{$usertwo->roll}}</td>
                                    </tr>
                                @endforeach
                            </tr>                         
                        </table>
                    </div>
                </div>
                <div class="class8">
                    <div class="class_subheader" data-toggle="collapse" href="#it11" aria-expanded="false" aria-controls="it48">
                        <span class="department">Information Technology</span>
                        <span class="year">1st </span>Year <span class="semester">1st </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="it11">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($itone as $userone)
                                    <tr>
                                        <td>{{$userone->name}}</td>
                                        <td>{{$userone->roll}}</td>
                                    </tr>
                                @endforeach
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="class_header">
                    Computer Science and Engineering
                </div>
                <div class="class9">
                    <div class="class_subheader" data-toggle="collapse" href="#cse48" aria-expanded="false" aria-controls="it48">
                        <span class="department">Computer Science and Engineering</span>
                        <span class="year">4th </span>Year <span class="semester">8th </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="cse48">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($cseeight as $cseeight)
                                <tr>
                                    <td>{{$cseeight->name}}</td>
                                    <td>{{$cseeight->roll}}</td>
                                </tr>
                                @endforeach
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="class10">
                    <div class="class_subheader" data-toggle="collapse" href="#cse47" aria-expanded="false" aria-controls="it48">
                        <span class="department">Computer Science and Engineering</span>
                        <span class="year">4th </span>Year <span class="semester">7th </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="cse47">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($cseseven as $cseseven)
                                <tr>
                                    <td>{{$cseseven->name}}</td>
                                    <td>{{$cseseven->roll}}</td>
                                </tr>
                                @endforeach
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="class11">
                    <div class="class_subheader" data-toggle="collapse" href="#cse36" aria-expanded="false" aria-controls="it48">
                        <span class="department">Computer Science and Engineering</span>
                        <span class="year">3rd </span>Year <span class="semester">6th </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="cse36">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($csesix as $csesix)
                                <tr>
                                    <td>{{$csesix->name}}</td>
                                    <td>{{$csesix->roll}}</td>
                                </tr>
                                @endforeach
                            </tr>                          
                        </table>
                    </div>
                </div>
                <div class="class12">
                    <div class="class_subheader" data-toggle="collapse" href="#cse35" aria-expanded="false" aria-controls="it48">
                        <span class="department">Computer Science and Engineering</span>
                        <span class="year">3rd </span>Year <span class="semester">5th </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="cse35">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($csefive as $csefive)
                                <tr>
                                    <td>{{$csefive->name}}</td>
                                    <td>{{$csefive->roll}}</td>
                                </tr>
                                @endforeach
                            </tr>                       
                        </table>
                    </div>
                </div>
                <div class="class10">
                    <div class="class_subheader" data-toggle="collapse" href="#cse24" aria-expanded="false" aria-controls="it48">
                        <span class="department">Computer Science and Engineering</span>
                        <span class="year">2nd </span>Year <span class="semester">4th </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="cse24">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($csefour as $csefour)
                                <tr>
                                    <td>{{$csefour->name}}</td>
                                    <td>{{$csefour->roll}}</td>
                                </tr>
                                @endforeach
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="class10">
                    <div class="class_subheader" data-toggle="collapse" href="#cse23" aria-expanded="false" aria-controls="it48">
                        <span class="department">Computer Science and Engineering</span>
                        <span class="year">2nd </span>Year <span class="semester">3rd </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="cse23">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($csethree as $csethree)
                                <tr>
                                    <td>{{$csethree->name}}</td>
                                    <td>{{$csethree->roll}}</td>
                                </tr>
                                @endforeach
                            </tr>                         
                        </table>
                    </div>
                </div>
                <div class="class10">
                    <div class="class_subheader" data-toggle="collapse" href="#cse12" aria-expanded="false" aria-controls="it48">
                        <span class="department">Computer Science and Engineering</span>
                        <span class="year">1st </span>Year <span class="semester">2nd </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="cse12">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($csetwo as $csetwo)
                                <tr>
                                    <td>{{$csetwo->name}}</td>
                                    <td>{{$csetwo->roll}}</td>
                                </tr>
                                @endforeach
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="class10">
                    <div class="class_subheader" data-toggle="collapse" href="#cse11" aria-expanded="false" aria-controls="it48">
                        <span class="department">Computer Science and Engineering</span>
                        <span class="year">1st </span>Year <span class="semester">1st </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="cse11">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($cseone as $cseone)
                                <tr>
                                    <td>{{$cseone->name}}</td>
                                    <td>{{$cseone->roll}}</td>
                                </tr>
                                @endforeach
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="class_header">
                    Textile Technology
                </div>
                <div class="class9">
                    <div class="class_subheader" data-toggle="collapse" href="#tt48" aria-expanded="false" aria-controls="it48">
                        <span class="department">Textile Technology</span>
                        <span class="year">4th </span>Year <span class="semester">8th </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="tt48">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($tteight as $tteight)
                                <tr>
                                    <td>{{$tteight->name}}</td>
                                    <td>{{$tteight->roll}}</td>
                                </tr>
                                @endforeach
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="class10">
                    <div class="class_subheader" data-toggle="collapse" href="#tt47" aria-expanded="false" aria-controls="it48">
                        <span class="department">Textile Technology</span>
                        <span class="year">4th </span>Year <span class="semester">7th </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="tt47">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($ttseven as $ttseven)
                                <tr>
                                    <td>{{$ttseven->name}}</td>
                                    <td>{{$ttseven->roll}}</td>
                                </tr>
                                @endforeach
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="class11">
                    <div class="class_subheader" data-toggle="collapse" href="#tt36" aria-expanded="false" aria-controls="it48">
                        <span class="department">Textile Technology</span>
                        <span class="year">3rd </span>Year <span class="semester">6th </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="tt36">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($ttsix as $ttsix)
                                <tr>
                                    <td>{{$ttsix->name}}</td>
                                    <td>{{$ttsix->roll}}</td>
                                </tr>
                                @endforeach
                            </tr>                          
                        </table>
                    </div>
                </div>
                <div class="class12">
                    <div class="class_subheader" data-toggle="collapse" href="#tt35" aria-expanded="false" aria-controls="it48">
                        <span class="department">Textile Technology</span>
                        <span class="year">3rd </span>Year <span class="semester">5th </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="tt35">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($ttfive as $ttfive)
                                <tr>
                                    <td>{{$ttfive->name}}</td>
                                    <td>{{$ttfive->roll}}</td>
                                </tr>
                                @endforeach
                            </tr>                       
                        </table>
                    </div>
                </div>
                <div class="class10">
                    <div class="class_subheader" data-toggle="collapse" href="#tt24" aria-expanded="false" aria-controls="it48">
                        <span class="department">Textile Technology</span>
                        <span class="year">2nd </span>Year <span class="semester">4th </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="tt24">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($ttfour as $ttfour)
                                <tr>
                                    <td>{{$ttfour->name}}</td>
                                    <td>{{$ttfour->roll}}</td>
                                </tr>
                                @endforeach
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="class10">
                    <div class="class_subheader" data-toggle="collapse" href="#tt23" aria-expanded="false" aria-controls="it48">
                        <span class="department">Textile Technology</span>
                        <span class="year">2nd </span>Year <span class="semester">3rd </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="tt23">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($ttthree as $ttthree)
                                <tr>
                                    <td>{{$ttthree->name}}</td>
                                    <td>{{$ttthree->roll}}</td>
                                </tr>
                                @endforeach
                            </tr>                         
                        </table>
                    </div>
                </div>
                <div class="class10">
                    <div class="class_subheader" data-toggle="collapse" href="#tt12" aria-expanded="false" aria-controls="it48">
                        <span class="department">Textile Technology</span>
                        <span class="year">1st </span>Year <span class="semester">2nd </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="tt12">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($tttwo as $tttwo)
                                <tr>
                                    <td>{{$tttwo->name}}</td>
                                    <td>{{$tttwo->roll}}</td>
                                </tr>
                                @endforeach
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="class10">
                    <div class="class_subheader" data-toggle="collapse" href="#tt11" aria-expanded="false" aria-controls="it48">
                        <span class="department">Textile Technology</span>
                        <span class="year">1st </span>Year <span class="semester">1st </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="tt11">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($ttone as $ttone)
                                <tr>
                                    <td>{{$ttone->name}}</td>
                                    <td>{{$ttone->roll}}</td>
                                </tr>
                                @endforeach
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="class_header">
                    Apparel Production and Management
                </div>
                <div class="class9">
                    <div class="class_subheader" data-toggle="collapse" href="#apm48" aria-expanded="false" aria-controls="it48">
                        <span class="department">Apparel Production and Management</span>
                        <span class="year">4th </span>Year <span class="semester">8th </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="apm48">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($apmeight as $apmeight)
                                <tr>
                                    <td>{{$apmeight->name}}</td>
                                    <td>{{$apmeight->roll}}</td>
                                </tr>
                                @endforeach
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="class10">
                    <div class="class_subheader" data-toggle="collapse" href="#apm47" aria-expanded="false" aria-controls="it48">
                        <span class="department">Apparel Production and Management</span>
                        <span class="year">4th </span>Year <span class="semester">7th </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="apm47">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($apmseven as $apmseven)
                                <tr>
                                    <td>{{$apmseven->name}}</td>
                                    <td>{{$apmseven->roll}}</td>
                                </tr>
                                @endforeach
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="class11">
                    <div class="class_subheader" data-toggle="collapse" href="#apm36" aria-expanded="false" aria-controls="it48">
                        <span class="department">Apparel Production and Management</span>
                        <span class="year">3rd </span>Year <span class="semester">6th </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="apm36">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($apmsix as $apmsix)
                                <tr>
                                    <td>{{$apmsix->name}}</td>
                                    <td>{{$apmsix->roll}}</td>
                                </tr>
                                @endforeach
                            </tr>                          
                        </table>
                    </div>
                </div>
                <div class="class12">
                    <div class="class_subheader" data-toggle="collapse" href="#apm35" aria-expanded="false" aria-controls="it48">
                        <span class="department">Apparel Production and Management</span>
                        <span class="year">3rd </span>Year <span class="semester">5th </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="apm35">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($apmfive as $apmfive)
                                <tr>
                                    <td>{{$apmfive->name}}</td>
                                    <td>{{$apmfive->roll}}</td>
                                </tr>
                                @endforeach
                            </tr>                       
                        </table>
                    </div>
                </div>
                <div class="class10">
                    <div class="class_subheader" data-toggle="collapse" href="#apm24" aria-expanded="false" aria-controls="it48">
                        <span class="department">Apparel Production and Management</span>
                        <span class="year">2nd </span>Year <span class="semester">4th </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="apm24">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($apmfour as $apmfour)
                                <tr>
                                    <td>{{$apmfour->name}}</td>
                                    <td>{{$apmfour->roll}}</td>
                                </tr>
                                @endforeach
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="class10">
                    <div class="class_subheader" data-toggle="collapse" href="#apm23" aria-expanded="false" aria-controls="it48">
                        <span class="department">Apparel Production and Management</span>
                        <span class="year">2nd </span>Year <span class="semester">3rd </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="apm23">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($apmthree as $apmthree)
                                <tr>
                                    <td>{{$apmthree->name}}</td>
                                    <td>{{$apmthree->roll}}</td>
                                </tr>
                                @endforeach
                            </tr>                         
                        </table>
                    </div>
                </div>
                <div class="class10">
                    <div class="class_subheader" data-toggle="collapse" href="#apm12" aria-expanded="false" aria-controls="it48">
                        <span class="department">Apparel Production and Management</span>
                        <span class="year">1st </span>Year <span class="semester">2nd </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="apm12">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($apmtwo as $apmtwo)
                                <tr>
                                    <td>{{$apmtwo->name}}</td>
                                    <td>{{$apmtwo->roll}}</td>
                                </tr>
                                @endforeach
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="class10">
                    <div class="class_subheader" data-toggle="collapse" href="#apm11" aria-expanded="false" aria-controls="it48">
                        <span class="department">Apparel Production and Management</span>
                        <span class="year">1st </span>Year <span class="semester">1st </span>Semester 
                        <i class="bi bi-chevron-down dropdown"></i>
                    </div>
                    <div class="table collapse" id="apm11">
                        <table>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll No</th>
                            </tr>
                            <tr>
                                @foreach($apmone as $apmone)
                                <tr>
                                    <td>{{$apmone->name}}</td>
                                    <td>{{$apmone->roll}}</td>
                                </tr>
                                @endforeach
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        //menuToggle
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');

        toggle.onclick = function(){
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }

        //add hovered class in selected list item
        let list = document.querySelectorAll('.navigation li');
        function activeLink(){
            list.forEach((item) =>
            item.classList.remove('clicked'));
            this.classList.add('clicked');
        }
        list.forEach((item) =>
        item.addEventListener('click',activeLink));
    </script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    
</body>
</html>