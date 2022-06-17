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

    <link rel="stylesheet" href="css/student-subject-style.css">

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
                <li class="clicked">
                    <a href="" class="icon">
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
                    Hello Student {{ Auth::user()->name }}
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

            <!-- subjects -->
            <div class="subject">
                <div class="subject_management-header">
                    Subject(s)
                </div>
                <table>
                    <tr>
                        <th>Subject</th>
                        <th>Assigned Teacher(s)</th>
                    </tr>
                    <tr>
                        <td>{{$subject}}</td>
                        <td>{{$teacher}}</td>
                    </tr>
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