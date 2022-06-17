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
                    <a href="{{ route('admin_subject') }}" class="icon">
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
                    <a href="#" class="icon">
                        <span class="icon"><ion-icon name="calendar-outline"></ion-icon></span>
                        <span class="title">Exam</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="icon">
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
                    <img src="kk.jpg" alt="">
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
                                    <form action="">
                                        <label for="email">Subject :</label>
                                        <input class="form-control" id="name" type="text" pattern="[a-zA-Z\s]+" 
                                        required="" autofocus="" autocomplete="" placeholder="Enter subject name">
                                        <label for="email">Assign to Class:</label>
                                        <input class="form-control" id="name" type="text" pattern="[a-zA-Z\s]+" 
                                        required="" autofocus="" autocomplete="" placeholder="Enter department name">
                                        <label for="email">Year:</label>
                                        <input class="form-control" id="name" type="text" pattern="[a-zA-Z\s]+" 
                                        required="" autofocus="" autocomplete="" placeholder="Enter year">
                                        <label for="email">Semester:</label>
                                        <input class="form-control" id="name" type="text" pattern="[a-zA-Z\s]+" 
                                        required="" autofocus="" autocomplete="" placeholder="Enter semester">
                                        <label for="email">Assign to Teacher:</label>
                                        <input class="form-control" id="name" type="text" pattern="[a-zA-Z\s]+" 
                                        required="" autofocus="" autocomplete="" placeholder="">
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary add-btn">Add Subject</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <table>
                    <tr>
                        <th>Subject</th>
                        <th>Assigned to Class(es)</th>
                        <th>Assigned Teacher(s)</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <tr>
                        <td>Cryptography and Network Security</td>
                        <td>
                            <ul>Information Technology 4th Year 8th Semester</ul>
                            <ul>Computer Science and Technology 4th Year 8th Semester</ul>
                        </td>
                        <td>
                            <ul>Abc Das</ul>
                            <ul>Efg Kar</ul>
                            <ul>Hij Kundu</ul>
                        </td>
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
                    </tr>
                    <tr>
                        <td>Cryptography</td>
                        <td>
                            <ul>Information Technology 4th Year 8th Semester</ul>
                            <ul>Computer Science and Technology 4th Year 8th Semester</ul>
                        </td>
                        <td>
                            <ul>Abc Das</ul>
                            <ul>Efg Kar</ul>
                        </td>
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
                    </tr>
                    <tr>
                        <td>Cryptography and Network Security</td>
                        <td>
                            <ul>Information Technology 4th Year 8th Semester</ul>
                        </td>
                        <td>
                            <ul>Abc Das</ul>
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
                                <ion-icon name="trash-outline"></ion-icon>
                            </div>
                        </td>
                    </tr>
                </table>
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
                                <form action="">
                                    <label for="email">Subject :</label>
                                    <input class="form-control" id="name" type="text" pattern="[a-zA-Z\s]+" 
                                    required="" autofocus="" autocomplete="" placeholder="Enter subject name">
                                    <label for="email">Assigned to Class:</label>
                                    <input class="form-control" id="name" type="text" pattern="[a-zA-Z\s]+" 
                                    required="" autofocus="" autocomplete="" placeholder="Enter department name">
                                    <label for="email">Year:</label>
                                    <input class="form-control" id="name" type="text" pattern="[a-zA-Z\s]+" 
                                    required="" autofocus="" autocomplete="" placeholder="Enter year">
                                    <label for="email">Semester:</label>
                                    <input class="form-control" id="name" type="text" pattern="[a-zA-Z\s]+" 
                                    required="" autofocus="" autocomplete="" placeholder="Enter semester">
                                    <label for="email">Assigned to Teacher:</label>
                                    <input class="form-control" id="name" type="text" pattern="[a-zA-Z\s]+" 
                                    required="" autofocus="" autocomplete="" placeholder="">

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary add-btn">Update Subject</button>
                                    </div>
                                </form>
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