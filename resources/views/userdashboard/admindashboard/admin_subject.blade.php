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

    <link rel="stylesheet" href="css/admin-subject-style.css">

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
                <li>
                    <a href="{{ route('admin_class') }}" class="icon">
                        <span class="icon"><ion-icon name="ribbon-outline"></ion-icon></span>
                        <span class="title">Class</span>
                    </a>
                </li>
                <li class="clicked">
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
                    <a href="{{ route('admin_stu') }}" class="icon">
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
            <div class="subject">
                <div class="subject_management-header">
                    Subject Management
                </div>
                <div class="add-subject">
                    <button type="button" class="btn btn-primary add-subject-btn" data-toggle="modal" data-target="#modalAddSubject">
                        <ion-icon name="add-circle-outline"></ion-icon>
                        Add Subject
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="modalAddSubject" tabindex="-1" role="dialog" aria-labelledby="modalAddSubjectTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalAddSubjectTitle">Add Subject</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <form action="{{ url('admin_subject') }}" method="POST">
                                        @csrf
                                        <label for="subject">Subject :</label>
                                        <input class="form-control" id="name" name="subject" type="text"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Subject name">
                                        <label for="department">Department</label>
                                        <input class="form-control" id="department" name="department" type="text"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Department name">
                                        <label for="year">Year:</label>
                                        <input class="form-control" id="year" type="text" name="year" 
                                        required="" autofocus="" autocomplete="" placeholder="Enter Year">
                                        <label for="semester">Semester:</label>
                                        <input class="form-control" id="semester" type="text" name="semester"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter semester">
                                        <label for="teacher">Assign to Teacher:</label>
                                        <input class="form-control" id="teacher" name="teacher" type="text"
                                        required="" autofocus="" autocomplete="" placeholder="Enter Teacher Name">

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary add-btn">Add Subject</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Subject</th>
                        <th>Assigned to Class(es)</th>
                        <th>Assigned Teacher(s)</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    @foreach($subject as $sub)
                    <tr>
                        <td>{{$sub->id}}
                        <td>{{$sub->subject}}</td>
                        <td>
                            {{$sub->department}} {{$sub->year}} Year {{$sub->semester}} Semester
                        </td>
                        <td>
                            {{$sub->teacher}}
                        </td>
                        <td>
                            <div class="edit-btn">
                                <a href="" data-toggle="modal" data-target="#modalUpdateSubject">
                                    <ion-icon name="create-outline"></ion-icon>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="delete-btn">
                                <a href="{{url('subject_delete/'.$sub->id) }}" class="btn btn-danger">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    
                </table>
                <!-- Modal -->
                
                <div class="modal fade" id="modalUpdateSubject" tabindex="-1" role="dialog" aria-labelledby="modalUpdateSubjectTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalUpdateSubjectTitle">Update Subject</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                            <div class="mb-3">
                                @foreach ($subject as $sub)
                                <form action="{{ url('update_subject_data/'.$sub->id) }}" method="POST">
                                    @csrf 
                                    @method('PUT')
                                    <h4>Update ID : {{$sub->id}} Subject</h4>
                                    <label for="subject">Subject :</label>
                                    <input class="form-control" id="name" name="subject" value="{{$sub->subject}}" type="text" 
                                    required="" autofocus="" autocomplete="" placeholder="Enter subject name">
                                    <label for="department">Department :</label>
                                    <input class="form-control" id="name" name="department" value="{{$sub->department}}" type="text"  
                                    required="" autofocus="" autocomplete="" placeholder="Enter department name">
                                    <label for="year">Year :</label>
                                    <input class="form-control" id="name" name="year" value="{{$sub->year}}" type="text"  
                                    required="" autofocus="" autocomplete="" placeholder="Enter year">
                                    <label for="semester">Semester :</label>
                                    <input class="form-control" id="name" name="semester" value="{{$sub->semester}}" type="text" 
                                    required="" autofocus="" autocomplete="" placeholder="Enter semester">
                                    <label for="teacher">Assigned to Teacher:</label>
                                    <input class="form-control" id="name" name="teacher" value="{{$sub->teacher}}" type="text" 
                                    required="" autofocus="" autocomplete="" placeholder="Enter Teacher Name">

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary add-btn">Update Subject</button>
                                    </div>
                                </form>
                                @endforeach
                            </div>
                        </div>                      
                    </div>
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