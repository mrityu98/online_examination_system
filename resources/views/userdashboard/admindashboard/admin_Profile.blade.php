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

    <link rel="stylesheet" href="css/admin-profile-style.css">

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
                <li class="clicked">
                    <a href="{{ route('admin_profile') }}" class="icon">
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

            <!-- Admin -->
            <div class="admin">
                <div class="profile-header">
                    Profile
                </div>
                <div class="container admin-profile">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="profile-img">
                                @foreach($data as $change)

                                    <div class="profile-img">
                                        <img src="{{ asset('uploads/users/'.$change->image) }}" alt="Image">
                                    </div>
                                @endforeach
                            </div>
                            <div class="image-upload">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                  Upload Image
                                </button>

                                <!-- Modal for Image Upload -->
                                @if($count==0)
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Upload Image</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <form action="{{ route('admin_profilee')}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <label for="user_id">User ID : </label>
                                                    <input class="form-control" type="number" name="user_id" required="" placeholder="Your ID" value="{{Auth::user()->id}}">
                                                    <label for="name">Name : </label>
                                                    <input class="form-control" type="text" name="name" required="" placeholder="Your Name" value="{{Auth::user()->name}}">
                                                    <label for="email">Email address:</label>
                                                    <input class="form-control" type="email" name="email" required="" value="{{Auth::user()->email}}" placeholder="Type your email address...">
                                                    <label for="formFileSm" class="form-label">Select Image File(*.jpg, *.jpeg, *.png)</label>
                                                    <input name="image" class="form-control form-control-sm" id="formFileSm" 
                                                    type="file" accept=".jpg, .jpeg, .png" required="">

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary update-image">Upload Image</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                @endif

                                <!-- Modal for Update Image -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ImageModalUpdate">
                                  Update Image
                                </button>

                                <div class="modal fade" id="ImageModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Update Image</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="col-mb-3">
                                            @foreach($data as $data)
                                                <form action="{{ url('student_image_update/'.$data->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <label for="formFileSm" class="form-label">Select Image File(*.jpg, *.jpeg, *.png)</label>
                                                    <input class="form-control form-control-sm" name="image" id="formFileSm" type="file" accept=".jpg, .jpeg, .png">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary update-image">Update Image</button>                                                      
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
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="profile-head">
                                        <h5>
                                            {{Auth::user()->name}}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" class="profile-edit-btn" data-toggle="modal" data-target="#modalLoginForm">Edit Profile</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 profile-details">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>ID</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{Auth::user()->id}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Name</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{Auth::user()->name}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{Auth::user()->email}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Phone</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{Auth::user()->mobile}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Department</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{Auth::user()->department}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>DOB</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{Auth::user()->dob}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Address</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{Auth::user()->address}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>          
                </div>
            </div>

            <!-- modal -->
            <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Update Profile</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="form" action="{{ url('update_student_data/'.Auth::user()->id) }}" method="POST">
                            @csrf 
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Full Name:</label>
                                <input class="form-control" id="name" type="text" name="name" value="{{ Auth::user()->name }}" pattern="[a-zA-Z\s]+" required="" autofocus="" title="Username should only contain letters. e.g. Piyush Gupta" autocomplete="" placeholder="Type your name here...">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address:</label>
                                <input class="form-control" type="email" name="email" value="{{ Auth::user()->email }}"  required="" placeholder="Type your email address..." pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile Number:</label>
                                <input class="form-control" type="text" name="mobile" value="{{ Auth::user()->mobile }}" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required="" placeholder="Type your Mobile Number...">
                            </div>
                            <div class="form-group">
                                <label for="department">Department:</label>
                                <input class="form-control" type="text" name="department" value="{{ Auth::user()->department }}" id="designation" required="" placeholder="Type your department...">
                            </div>
                            <div class="form-group">
                                <label for="year">Year:</label>
                                <input class="form-control" type="text" name="year" value="{{ Auth::user()->year }}" id="designation" required="" placeholder="Type your year...">
                            </div>
                            <div class="form-group">
                                <label for="semester">Semester:</label>
                                <input class="form-control" type="text" name="semester" value="{{ Auth::user()->semester }}" id="designation" required="" placeholder="Type your semester...">
                            </div>
                            <div class="form-group">
                                <label for="dob">Date of Birth:</label>
                                <input class="form-control" type="date" id="dob" name="dob" value="{{ Auth::user()->dob }}" required="" placeholder="Type your Date of Birth...">
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input class="form-control" type="text" id="dob" name="address" value="{{ Auth::user()->address }}" required="" placeholder="Type your Address...">
                            </div>
                                            
                            <div class="text-right">
                                <button class="movebtn movebtnre" type="Reset"><ion-icon name="refresh-outline"></ion-icon> Reset </button>
                                <button class="movebtn movebtnsu" type="Submit">Submit <ion-icon name="paper-plane-outline"></ion-icon></button>
                            </div>
                        </form>
                        <!-- <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-outline-primary">Save Changes</button>
                            <button type="button" class="btn btn-outline-secondary">cancel</button>
                        </div> -->
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