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

    <link rel="stylesheet" href="css/admin-student-style.css">

    <!-- favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="x-icon">
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
                <li>
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
                <li class="clicked">
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
            <div class="student">
                <div class="student_management-header">
                    Student Management
                </div>
                <!-- <div class="add-student">
                    <div class="add-student-btn">
                        <ion-icon name="add-circle-outline"></ion-icon>
                        Add Student
                    </div>
                </div> -->
                <table>
                    <tr>
                        <th>ID</th>                     
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Department</th>
                        <th>Year</th>
                        <th>Semester</th>
                        <th>Address</th>
                        <th>Date of Birth</th>
                        <th>Added On</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        
                    </tr>               

                    @foreach($StudentShow as $key=>$student)
                    <tr>
                       
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td class="break_word">{{ $student->email }}</td>
                        <td>{{ $student->mobile }}</td>
                        <td>{{ $student->department }}</td>
                        <td>{{ $student->year }}</td>
                        <td>{{ $student->semester }}</td>
                        <td>{{ $student->address }}</td>
                        <td>{{ $student->dob }}</td>
                        <td>{{ $student->created_at }}</td>
                       
                        <td>
                            <div class="edit-btn">
                                <a href="" data-toggle="modal" data-target="#modal-update-role">
                                    <ion-icon name="create-outline"></ion-icon>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="delete-btn">
                                <a href="{{url('stu_delete/'.$student->id) }}" class="btn btn-danger">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </a>
                            </div>
                        </td>

                        <!-- @foreach($img as $kpk)

                        <td><img src="{{ asset('uploads/users/'.$kpk->image) }}" alt="Image" ></td>
                        @endforeach -->
                        
                    </tr>
                    @endforeach

                    <!-- <tr>
                        <th> Email </th>
                        <th> Image </th>
                    </tr>

                    @foreach($img as $img)
                    <tr>
                        <td>{{$img->email}}
                        <td><img src="{{ asset('uploads/users/'.$kpk->image) }}" alt="Image" ></td>
                    </tr>
                    @endforeach -->
                </table>
            </div>

            <!-- modal -->
            <div class="modal fade" id="modal-update-role" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Update Role</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="form" action="{{ url('update_teacher_role/'.$student->id) }}" method="POST">
                            @csrf 
                            @method('PUT')
                            <div class="form-group">
                                <label for="email">Role:</label>
                                <select class="form-control" name="is_admin" id="role">
                                    <option value="" selected disabled>Choose Your Option</option>
                                    <option value="1">Teacher</option>
                                    <option value="2">Admin</option>
                                </select>
                            </div>
                                            
                            <div class="text-right">
                                <button class="movebtn movebtnre" type="Reset"><ion-icon name="refresh-outline"></ion-icon> Reset </button>
                                <button class="movebtn movebtnsu" type="Submit">Update <ion-icon name="paper-plane-outline"></ion-icon></button>
                            </div>
                        </form>
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
</body>
</html>