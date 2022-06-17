<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Examination System</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="css/admin-student-style.css">
    <!-- favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="x-icon">

    
</head>
<body>
    <div class="containerr">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#" class="icon">
                        <span class="icon"><ion-icon name="school"></ion-icon></span>
                        <span class="title">Online Examination System</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="icon">
                        <span class="icon"><ion-icon name="grid-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="clicked">
                    <a href="{{ route ('stu_profile') }}" class="icon">
                        <span class="icon"><ion-icon name="exit-outline"></ion-icon></span>
                        <span class="title">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="icon">
                        <span class="icon"><ion-icon name="documents-outline"></ion-icon></span>
                        <span class="title">Subject</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="icon">
                        <span class="icon"><ion-icon name="calendar-outline"></ion-icon></span>
                        <span class="title">Exam</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="icon">
                        <span class="icon"><ion-icon name="reader-outline"></ion-icon></span>
                        <span class="title">Result</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="icon">
                        <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                        <span class="title">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route ('stulogout') }}" class="icon">
                        <span class="icon"><ion-icon name="exit-outline"></ion-icon></span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>

            </ul>
        </div>
        

        <!-- main -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <!-- Role -->
                <div class="role">
                    Student
                </div>
                <!-- userimg -->
                <div class="user">
                    <img src="kundu.jpeg" alt="">
                </div>
            </div>

            <!-- student -->
            <div class="student">
                <div class="student_management-header">
                    Student Management <br><br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Update Data
                        </button>
                </div>
                <div>
                    <div>
                                  @if(\Session::has('success'))
                                      <div class="alert alert-success">
                                          <p> {{\Session::get('success') }}</p>
                                  @endif

                        

                        
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <form action="{{ route('stu_profil') }}" method="POST">
                                        @csrf
                                    <div class="modal-body">
                                    
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter Name" required autofocus>
                                        </div>
                                        <div class="form-group">
                                        <label>Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="Enter Email" required autofocus>
                                        </div>
                                        <div class="form-group">
                                        <label>Address</label>
                                            <input type="text" name="address" class="form-control" placeholder="Enter Address" required autofocus>
                                        </div>
                                        <div class="form-group">
                                        <label>Mobile</label>
                                            <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile No." required autofocus>
                                        </div>
                                        <div class="form-group">
                                        <label>Date of Birth</label>
                                            <input type="date" name="dob" class="form-control" placeholder="Enter Date of Birth" required autofocus>
                                        </div>
                                        <div class="form-group">
                                        <label>Roll No</label>
                                            <input type="text" name="roll_no" class="form-control" placeholder="Enter Roll No. " required autofocus>
                                        </div>
                                        <div class="form-group">
                                        <label>Department</label>
                                            <input type="text" name="department" class="form-control" placeholder="Enter Department " required autofocus>
                                        </div>
                                   </div>
                                   
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                       <button type="submit" class="btn btn-primary">Save changes</button>
                                   
                                   </form>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Button trigger modal -->


                <table>
                    <tr>
                        <th>SL No.</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Class</th>
                        <th>Date of Birth</th>
                        <th>Address</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Name</th>
                    </tr>

                    @foreach($StudentShow as $key=>$student)


                    <tr>
                        <td>{{ $student->id }}</td>
                        <td><img src="ajay.png" alt=""></td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->mobile }}</td>
                        <td>{{ $student->department }}</td>
                        <td>{{ $student->dob }}</td>
                        <td>{{ $student->address }}</td>
                        <td>
                            <div class="edit-btn">
                                <ion-icon name="create-outline"></ion-icon>
                            </div>
                        </td>
                        <td>
                            <div class="delete-btn">
                                <ion-icon name="trash-outline"></ion-icon>
                            </div>
                        </td>
                        <td> {{ Auth::user()->name }}</td>
                    </tr>


                    @endforeach
                    
                </table>
            </div>
        </div>

        

    </div>

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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>