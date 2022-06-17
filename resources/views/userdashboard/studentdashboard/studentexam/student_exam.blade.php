
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

    <link rel="stylesheet" href="css/student-exam-style.css">

    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="containerr" id="PPP">
        <div class="navigation active">
        <ul>
                <li>
                    <a href="#" class="icon">
                        <span class="icon"><ion-icon name="school"></ion-icon></span>
                        <span class="title">Online Examination System</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('student_dashboard') }}" class="icon">
                        <span class="icon"><ion-icon name="grid-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('stu_profile') }}" class="icon">
                        <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                        <span class="title">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('student_subject') }}" class="icon">
                        <span class="icon"><ion-icon name="documents-outline"></ion-icon></span>
                        <span class="title">Subject</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('student_class') }}" class="icon">
                        <span class="icon"><ion-icon name="documents-outline"></ion-icon></span>
                        <span class="title">Class</span>
                    </a>
                </li>
                <li class="clicked">
                    <a href="" class="icon">
                        <span class="icon"><ion-icon name="calendar-outline"></ion-icon></span>
                        <span class="title">Exam</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('student_result') }}" class="icon">
                        <span class="icon"><ion-icon name="reader-outline"></ion-icon></span>
                        <span class="title">Result</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('stulogout') }}" class="icon">
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
                    Hello Student {{Auth::user()->name}}
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

            <!-- exam details -->
            <div class="exam_details exam_tabs" id="exam_details">
                <div class="exam_details-header">
                    Exam Details
                </div>
                <table>
                    <tr>
                        <th>Exam Name</th>
                        <th>Subject</th>
                        <th>Exam Date</th>
                        <th>Exam Time</th>
                        <th>Duration</th>
                        <th>Total Questions</th>
                        <th>Marks for right answer</th>
                        <th>Negative marks</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach($exam as $each)
                    <tr>
                        <td>{{$each->name}}</td>
                        <td>{{$each->subject}}</td>
                        <td>
                            {{$each->date}}
                        </td>
                        <td>{{$each->start_time}}</td>
                        <td>{{$each->duration}}</td>
                        <td>{{$each->t_question}}</td>
                        <td>1</td>
                        <td>.25</td>
                        <td>
                            @if($each->status==0)
                                <h5 class="btn-primary" >Not Start</h5>
                            @elseif($each->name=='Cryptography CA2' && $result1>0 && $each->status==1)
                                <h5 class="btn-danger">Ended</h5>
                            @elseif($each->name=='E-comerce CA2' && $result2>0 && $each->status==1)
                                <h5 class="btn-danger">Ended</h5>
                            @elseif($each->name=='Cyber Law CA2' && $result3>0 && $each->status==1)
                                <h5 class="btn-danger">Ended</h5>
                            @elseif($each->name=='Robotics CA4' && $result4>0 && $each->status==1)
                                <h5 class="btn-danger">Ended</h5>
                            @else
                            <h5 class="btn-success" >Started</h5>
                            @endif
                        </td>                      
                        <td>
                            @if($each->name=='Cryptography CA2' && $result1==0 && $each->status==1)
                                <a href="{{url('start_exam/'.$each->id)}}"><button  type="button" class="btn btn-primary add-btn" data-target="">
                                    Start Exam
                                </button></a>
                            @elseif($each->name=='E-comerce CA2' && $result2==0 && $each->status==1)
                                <a href="{{url('start_exam/'.$each->id)}}"><button  type="button" class="btn btn-primary add-btn" data-target="">
                                    Start Exam
                                </button></a>
                            @elseif($each->name=='Cyber Law CA2' && $result3==0 && $each->status==1)
                                <a href="{{url('start_exam/'.$each->id)}}"><button  type="button" class="btn btn-primary add-btn" data-target="">
                                    Start Exam
                                </button></a>
                            @elseif($each->name=='Robotics CA4' && $result4==0 && $each->status==1)
                                <a href="{{url('start_exam/'.$each->id)}}"><button  type="button" class="btn btn-primary add-btn" data-target="">
                                    Start Exam
                                </button></a>
                            @elseif($each->name=='Cryptography CA2' && $result1>0 && $each->status==1)
                                <a href=""><button  type="button" class="btn" data-target="">
                                    Exam Over
                                </button></a>
                            @elseif($each->name=='E-comerce CA2' && $result2>0 && $each->status==1)
                                <a href=""><button  type="button" class="btn" data-target="">
                                    Exam Over
                                </button></a>
                            @elseif($each->name=='Cyber Law CA2' && $result3>0 && $each->status==1)
                                <a href=""><button  type="button" class="btn" data-target="">
                                    Exam Over
                                </button></a>
                            @elseif($each->name=='Robotics CA4' && $result4>0 && $each->status==1)
                                <a href=""><button  type="button" class="btn" data-target="">
                                    Exam Over
                                </button></a>
                            @else
                                <a href=""><button  type="button" class="btn btn-danger " data-target="">
                                    Not Start
                                </button></a>
                            @endif
                        </td>  
                    </tr>
                    @endforeach
                    
                </table>
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

    <script>
        var elem = document.getElementById("PPP");
        function openFullscreen() 
        {
            if (elem.requestFullscreen) 
            {
                elem.requestFullscreen();
            } 
            else if (elem.webkitRequestFullscreen) 
            { /* Safari */
                elem.webkitRequestFullscreen();
            } 
            else if (elem.msRequestFullscreen) 
            { /* IE11 */
                elem.msRequestFullscreen();
            }
        }
    </script>
    
</body>
</html>