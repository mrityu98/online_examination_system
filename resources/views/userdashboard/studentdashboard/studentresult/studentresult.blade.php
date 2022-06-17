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

    <link rel="stylesheet" href="css/student-result-style.css">

    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <style>
        /* Google fonts */
        @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,500;0,700;1,100;1,500;1,700&display=swap');

        *
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Raleway', sans-serif;
        }

        :root{
            --blue: #2c2992;
            --blue-light: #3f3acf;
            --white: #fff;
            --grey: #f5f5f5;
            --black1: #222;
            --black2: #999;
        }

        body{
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* nav */

        .containerr{
            position: relative;
            width: 100%;
        }
        .navigation{
            position: fixed;
            width: 300px;
            height: 100%;
            background: var(--blue);
            border-left: 10px solid var(--blue);
            transition: 0.5s;
            overflow: hidden;
        }

        .navigation.active{
            width: 80px;
        }

        .navigation ul{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }

        .navigation ul li{
            position: relative;
            width: 100%;
            list-style: none;
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
        }

        .navigation ul li:hover,
        .navigation ul li.clicked{
        background: var(--white);
        }

        .navigation ul li:nth-child(1){
            margin-bottom: 40px;
            pointer-events: none;
        }

        .navigation ul li a{
            position: relative;
            width: 100%;
            display: flex;
            text-decoration: none;
            color: var(--white);
        }
        .navigation ul li:hover a,
        .navigation ul li.clicked a{
            color: var(--blue);
        }

        .navigation ul li a .icon{
            position: relative;
            display: block;
            min-width: 60px;
            height: 60px;
            line-height: 70px;
            text-align: center;
        }

        .navigation ul li a .icon ion-icon{
            font-size: 1.75em;
        }

        .navigation ul li a .title{
            position: relative;
            display: block;
            padding: 0 10px;
            height: 60px;
            line-height: 60px;
            text-align: start;
            white-space: nowrap;
        }

        .navigation ul li:hover a::before,
        .navigation ul li.clicked a::before{
            content: '';
            position: absolute;
            right: 0;
            top: -50px;
            width: 50px;
            height: 50px;
            background: transparent;
            border-radius: 50%;
            box-shadow: 35px 35px 0 10px var(--white);
            pointer-events: none;
        }

        .navigation ul li:hover a::after,
        .navigation ul li.clicked a::after{
            content: '';
            position: absolute;
            right: 0;
            bottom: -50px;
            width: 50px;
            height: 50px;
            background: transparent;
            border-radius: 50%;
            box-shadow: 35px -35px 0 10px var(--white);
            pointer-events: none;
        }


        /* main */
        .main{
            position: absolute;
            width: calc(100% - 300px);
            left: 300px;
            min-height: 100vh;
            background: var(--white);
            transition: 0.5s;
        }
        .main.active{
            width: calc(100% - 80px);
            left: 80px;
        }

        .topbar{
            width: 100%;
            height: 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 10px;
            color: var(--black2);
        }

        .toggle{
            position: relative;
            width: 60px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2.5em;
            cursor: pointer;
        }

        .role{
            font-size: 1.1em;
        }

        .user{
            position: relative;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            cursor: pointer;
        }

        .user img{
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        /* result_details */
        .result_details-header{
            margin: 30px 30px 40px;
            font-size: 32px;
            font-weight: 700;
            color: var(--blue);
        }

        table{
            border-collapse: collapse;
            margin: 0px 30px 50px;
            width: 80%;
        }

        table,
        th,
        td{
            border: #2c2992 2px solid;
        }

        table th,
        table td{
            text-align: center;
            padding: 5px;
        }

        table td img{
            height: 48px;
            width: 48px;
        }

        table td{
            font-size: 16px;
        }

        table a{
            color: var(--white);
            text-decoration: none;
        }

        table button{
            color: #fff;
            border: none;
            outline: none;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            padding: 2px 4px;
            background: var(--blue);
        }

        .btn{
            background-color: var(--blue);
        }
        .btn:hover{
            background-color: var(--blue-light);
        }


        /* Responsive */
        @media (max-width: 990px){
        .navigation{
            width: 300px;
            left: 0;
        }
        .navigation.active{
            left: -300px;
        }
        .main{
            left: 300px;
        }
        .main.active{
            width: 100%;
            left: 0;
        }
    
        }

        @media (max-width: 768px){
    
        }

        @media (max-width: 480px){
    
        .navigation{
            width: 100%;
            left: -100%;
            z-index: 1000;
        }
        .navigation.active{
            width: 100%;
            left: 0;
        }
        .toggle{
            z-index: 10001;
        }
        .main.active .toggle{
            right: 0;
            left: initial;
            color: var(--white);
        }
        }
    </style>
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
                <li>
                    <a href="{{ route('student_exam') }}" class="icon">
                        <span class="icon"><ion-icon name="calendar-outline"></ion-icon></span>
                        <span class="title">Exam</span>
                    </a>
                </li>
                <li class="clicked">
                    <a href="" class="icon">
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

            <!-- result details -->
            <div class="result_details" id="result_details">
                <div class="result_details-header">
                    Result Details
                </div>
                <table>
                    <tr>
                        <th>Exam ID</th>
                        <th>Exam Name</th>
                        <th>Subject</th>
                        <th>Exam Date</th>
                        <th>Exam Time</th>
                        <th>Full Marks</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach($exam as $exam)
                    <tr>
                        <td>{{$exam->id}}</td>
                        <td>{{$exam->name}}</td>
                        <td>{{$exam->subject}}</td>
                        <td>
                            {{$exam->date}}
                        </td>
                        <td>{{$exam->start_time}}</td>
                        <td>{{$exam->t_question*1}}</td>
                        <td>
                            @if($exam->status==0)
                                <h5 class="btn-primary" >Not Started</h5>
                            @elseif($exam->name=='Cryptography CA2' && $result1>0 && $exam->status==1)
                                <h5 class="btn-danger">Ended</h5>
                            @elseif($exam->name=='E-comerce CA2' && $result2>0 && $exam->status==1)
                                <h5 class="btn-danger">Ended</h5>
                            @elseif($exam->name=='Cyber Law CA2' && $result3>0 && $exam->status==1)
                                <h5 class="btn-danger">Ended</h5>
                            @elseif($exam->name=='Robotics' && $result4>0 && $exam->status==1)
                                <h5 class="btn-danger">Ended</h5>
                            @else
                            <h5 class="btn-success" >Started</h5>
                            @endif
                        </td>
                        <td>
                            @if($exam->name=='Cryptography CA2' && $result1==1 && $exam->status==1)
                                <a href="{{ url('student_result_view/'.$exam->id) }}" class="btn btn-primary">
                                    View Result
                                </a>
                            @elseif($exam->name=='E-comerce CA2' && $result2==1 && $exam->status==1)
                                <a href="{{url('student_result_view/'.$exam->id)}}"><button  type="button" class="btn btn-primary add-btn" data-target="">
                                    View Result
                                </button></a>
                            @elseif($exam->name=='Cyber Law CA2' && $result3==1 && $exam->status==1)
                                <a href="{{url('student_result_view/'.$exam->id)}}"><button  type="button" class="btn btn-primary add-btn" data-target="">
                                    View Result
                                </button></a>
                            @elseif($exam->name=='Robotics CA4' && $result4==1 && $exam->status==1)
                                <a href="{{url('student_result_view/'.$exam->id)}}"><button  type="button" class="btn btn-primary add-btn" data-target="">
                                    View Result
                                </button></a>
                            @elseif($exam->name=='Cryptography CA2' && $result1==0 && $exam->status==1)
                                <a href=""><button  type="button" class="btn" data-target="">
                                    Please Give Exam
                                </button></a>
                            @elseif($exam->name=='E-comerce CA2' && $result2==0 && $exam->status==1)
                                <a href=""><button  type="button" class="btn" data-target="">
                                    Please Give Exam
                                </button></a>
                            @elseif($exam->name=='Cyber Law CA2' && $result3==0 && $exam->status==1)
                                <a href=""><button  type="button" class="btn" data-target="">
                                    Please Give Exam
                                </button></a>
                            @elseif($exam->name=='Robotics CA4' && $result4==0 && $exam->status==1)
                                <a href=""><button  type="button" class="btn" data-target="">
                                    Please Give Exam
                                </button></a>
                            @elseif($exam->name=='Cryptography CA2' && $result1==0 && $exam->status==0)
                                <a href=""><button  type="button" class="btn btn-danger " data-target="">
                                    Your Exam Not Started
                                </button></a>
                            @elseif($exam->name=='E-comerce CA2' && $result2==0 && $exam->status==0)
                                <a href=""><button  type="button" class="btn btn-danger " data-target="">
                                    Your Exam Not Started
                                </button></a>
                            @elseif($exam->name=='Cyber Law CA2' && $result3==0 && $exam->status==0)
                                <a href=""><button  type="button" class="btn btn-danger " data-target="">
                                    Your Exam Not Started
                                </button></a>
                            @elseif($exam->name=='Robotics CA4' && $result4==0 && $exam->status==0)
                                <a href=""><button  type="button" class="btn btn-danger " data-target="">
                                    Your Exam Not Started
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
    
</body>
</html>