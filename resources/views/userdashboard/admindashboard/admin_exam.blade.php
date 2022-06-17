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

    <link rel="stylesheet" href="css/admin-exam-style.css">

    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <style>
      .unselectable {
        -webkit-user-select: none;
        -webkit-touch-callout: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
    </style>
</head>
<body class="unselectable">
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
                <li>
                    <a href="{{ route('admin_stu') }}" class="icon">
                        <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class="title">Student</span>
                    </a>
                </li>
                <li class="clicked">
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

            <!-- exam tab -->
            <div class="exam_tab">
                <div class="exam_tab_options">
                    <div class="col-md-4">
                        <button class="tabs_button active_tab_button" data-tab-target="#exam_management" target="1">Exam Management</button>
                    </div>
                    <div class="col-md-4">
                        <button class="tabs_button" data-tab-target="#exam_details">Exam Details</button>
                    </div>
                    <div class="col-md-4">
                        <button class="tabs_button" data-tab-target="#questions">Questions</button>
                    </div>
                </div>
            </div>

            <!-- exam management-->
            <div class="exam_management exam_tabs exam_tabs_active" id="exam_management" data-tab-content>
                <div class="exam_management-header">
                    Exam Management
                </div>
                <div class="exam-subject">
                    <button type="button" class="btn btn-primary add-btn" data-toggle="modal" data-target="#modalAddExam">
                        <ion-icon name="add-circle-outline"></ion-icon>
                        Add Exam
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="modalAddExam" tabindex="-1" role="dialog" aria-labelledby="modalAddExamTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalAddExamTitle">Add Exam</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <form action="{{ route('admin_exam') }}" method="POST">
                                        @csrf
                                        <label for="name">Exam Name :</label>
                                        <input class="form-control" id="name" name="name" type="text"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Exam name">
                                        <label for="subject">Subject Name :</label>
                                        <input class="form-control" id="subject" name="subject" type="text" 
                                        required="" autofocus="" autocomplete="" placeholder="Enter Subject name">
                                        <label for="department">Department :</label>
                                        <input class="form-control" id="subject" name="department" type="text"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Department name">
                                        <label for="year">Year :</label>
                                        <input class="form-control" id="subject" name="year" type="text"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Year">
                                        <label for="semester">Semester :</label>
                                        <input class="form-control" id="subject" name="semester" type="text"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Semester">
                                        <label for="date">Date :</label>
                                        <input class="form-control" id="date" name="date" type="date"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Date">
                                        <label for="time">Time :</label>
                                        <input class="form-control" id="date" name="start_time" type="time"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Time">
                                        <label for="duration">Duration(minutes) :</label>
                                        <input class="form-control" id="duration" name="duration"  type="number"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Duration in minutes">
                                        <label for="duration">Total Question :</label>
                                        <input class="form-control" id="duration" name="t_question"  type="number"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Total Question">
                                        <label for="duration">Teacher ID :</label>
                                        <input class="form-control" id="teacher_id" name="teacher_id"  type="number"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Teacher Id">
                                        <label for="duration">Teacher Name :</label>
                                        <input class="form-control" id="teacher" name="teacher"  type="text"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Teacher Name">

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary add-btn">Add Exam</button>
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
                        <th>Exam Name</th>
                        <th>Subject</th>
                        <th>Assigned to Class</th>
                        <th>Exam Date</th>
                        <th>Duration</th>
                        <th>Assigned Teacher</th>
                        <th>Result</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach($exam as $detail)
                    <tr>
                        <td>{{$detail->name}}</td>
                        <td>{{$detail->subject}}</td>
                        <td>
                            {{$detail->department}} {{$detail->year}} Year {{$detail->semester}} Semester
                        </td>
                        <td>
                            {{$detail->date}}
                        </td>
                        <td>{{$detail->duration}}</td>
                        <td>{{$detail->teacher}}</td>
                        <td>
                            Exam Pending
                        </td>
                        <td>
                            <div class="edit-btn">
                                <a href="" data-toggle="modal" data-target="#modalUpdateExam">
                                    <ion-icon name="create-outline"></ion-icon>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="delete-btn">
                                <a href="{{url('exam_delete/'.$detail->id) }}" class="btn btn-danger">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    
                </table>
                <!-- Modal -->
                <div class="modal fade" id="modalUpdateExam" tabindex="-1" role="dialog" aria-labelledby="modalUpdateSubjectExam" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalUpdateExamTitle">Update Exam</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                @foreach($exam as $details)
                                <form action="{{ url('update_exam_data/'.$details->id) }}" method="POST">
                                    @csrf 
                                    @method('PUT')
                                        <label for="name">Exam Name :</label>
                                        <input onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off class="form-control" id="name" name="name" value="{{$details->name}}" type="text"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Exam name">
                                        <label for="subject">Subject Name :</label>
                                        <input class="form-control" id="subject" name="subject" value="{{$details->subject}}" type="text" 
                                        required="" autofocus="" autocomplete="" placeholder="Enter Subject name">
                                        <label for="department">Department :</label>
                                        <input class="form-control" id="subject" name="department" value="{{$details->department}}" type="text"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Department name">
                                        <label for="year">Year :</label>
                                        <input class="form-control" id="subject" name="year" value="{{$details->year}}" type="text"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Year">
                                        <label for="semester">Semester :</label>
                                        <input class="form-control" id="subject" name="semester" value="{{$details->semester}}" type="text"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Semester">
                                        <label for="date">Date :</label>
                                        <input class="form-control" id="date" name="date" value="{{$details->date}}" type="date"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Date">
                                        <label for="time">Time :</label>
                                        <input class="form-control" id="date" name="start_time" value="{{$details->start_time}}" type="time"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Time">
                                        <label for="duration">Duration(minutes) :</label>
                                        <input class="form-control" id="duration" name="duration" value="{{$details->duration}}"  type="number"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Duration in minutes">
                                        <label for="duration">Total Question :</label>
                                        <input class="form-control" id="duration" name="t_question" value="{{$details->t_question}}" type="number"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Total Question">
                                        <label for="duration">Teacher ID :</label>
                                        <input class="form-control" id="teacher_id" name="teacher_id" value="{{$details->teacher_id}}" type="number"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Teacher Id">
                                        <label for="duration">Teacher Name :</label>
                                        <input class="form-control" id="teacher" name="teacher" value="{{$details->teacher}}" type="text"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Teacher Name">

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary add-btn">Update Exam Details</button>
                                        </div>
                                </form>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <!-- exam details -->
            <div class="exam_details exam_tabs" id="exam_details" target="2">
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
                        <th>Marks for right ans</th>
                        <th>Negative marks</th>
                        <th>Result</th>
                    </tr>
                    @foreach($exam as $eexam)
                    <tr>
                        <td>{{$eexam->name}}</td>
                        <td>{{$eexam->subject}}</td>
                        <td>{{$eexam->date}}</td>
                        <td>{{$eexam->start_time}}
                        <td>{{$eexam->duration}}</td>
                        <td>{{$eexam->t_question}}</td>
                        <td>{{$eexam->r_mark}}</td>
                        <td>{{$eexam->n_mark}}</td>
                        <td>
                            Exam Pending
                        </td>
                    </tr>
                    @endforeach
                </table>
                <!-- Modal -->
                <div class="modal fade" id="modalUpdateExamDetails" tabindex="-1" role="dialog" aria-labelledby="modalUpdateExamDetails" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalUpdateExamDetailsTitle">Update Exam Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <form action="">
                                    <label for="examname">Exam :</label>
                                    <input class="form-control" id="examname" type="text" pattern="[a-zA-Z\s]+" 
                                    required="" autofocus="" autocomplete="" placeholder="Enter exam name">
                                    <label for="subject">Assigned to Subject:</label>
                                    <input class="form-control" id="subject" type="text" pattern="[a-zA-Z\s]+" 
                                    required="" autofocus="" autocomplete="" placeholder="Enter department name">
                                    <label for="date">Date & Time:</label>
                                    <input class="form-control" id="date" type="date"
                                    required="" autofocus="" autocomplete="" placeholder="Select date">
                                    <input class="form-control" id="time" type="time"
                                    required="" autofocus="" autocomplete="" placeholder="Select time">
                                    <label for="duration">Duration(minutes):</label>
                                    <input class="form-control" id="duration" type="number"  
                                    required="" autofocus="" autocomplete="" placeholder="Enter duration in minutes">
                                    <label for="qno">Number of Questions :</label>
                                    <input class="form-control" id="qno" type="number"
                                    required="" autofocus="" autocomplete="" placeholder="Select number of questions">
                                    <label for="marks">Marks for right answer :</label>
                                    <input class="form-control" id="marks" type="number"
                                    required="" autofocus="" autocomplete="" placeholder="Select marks for right answer">
                                    <label for="negmarks">Negative marks :</label>
                                    <input class="form-control" id="negmarks" type="number"
                                    required="" autofocus="" autocomplete="" placeholder="Select negative Marks for wrong answer">
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary add-btn">Update Exam Details</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <!-- questions -->
            <div class="questions exam_tabs" id="questions" target="3">
                <div class="questions-header">
                    Question Management
                </div>
                <div class="question">
                    <button type="button" class="btn btn-primary add-btn" data-toggle="modal" data-target="#modalAddQuestion">
                        <ion-icon name="add-circle-outline"></ion-icon>
                        Add Question
                    </button>
                    
                    <!- Modal -->
                    <div class="modal fade" id="modalAddQuestion" tabindex="-1" role="dialog" aria-labelledby="modalAddQuestionTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalAddQuestionTitle">Add Question</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <form action="{{ route('teacher_question') }}" method="POST">
                                        @csrf
                                        <label for="exam_id">Exam ID :</label>
                                        <input class="form-control" id="exam_id" name="exam_id" type="number"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Exam ID">

                                        <label for="exam_name">Exam Name :</label>
                                        <input class="form-control" id="exam_name" name="exam_name" type="text"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Exam Name">

                                        <label for="q_name">Question :</label>
                                        <input class="form-control" id="question" name="question" type="text"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Question">

                                        <label for="op_1">Option 1 :</label>
                                        <input class="form-control" id="op_1" name="op_1" type="text"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter option 1">

                                        <label for="op_2">Option 2 :</label>
                                        <input class="form-control" id="op_2" name="op_2" type="text"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter option 2">

                                        <label for="op_3">Option 3 :</label>
                                        <input class="form-control" id="op_3" name="op_3" type="text" 
                                        required="" autofocus="" autocomplete="" placeholder="Enter option 3">

                                        <label for="op_4">Option 4 :</label>
                                        <input class="form-control" id="op_4" name="op_4" type="text"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter option 4">

                                        <label for="r_op">Right Option :</label>
                                        <select class="form-control" id="r_op" name="r_op">
                                            <option value="" selected disabled>Choose Your Option</option>
                                            <option value="op_1">Option 1</option>
                                            <option value="op_2">Option 2</option>
                                            <option value="op_3">Option 3</option>
                                            <option value="op_4">Option 4</option>
                                        </select>

                                        <label for="teacher_id">Teacher ID :</label>
                                        <input class="form-control" id="teacher_id" name="teacher_id" type="number"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Teacher ID ">

                                        <label for="teacher">Teacher Name :</label>
                                        <input class="form-control" id="teacher" name="teacher" type="text"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Teacher Name">

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary add-btn">Add Question</button>
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
                        <th>Question ID </th>
                        <th>Exam ID</th>
                        <th>Exam Name</th>
                        <th>Teacher ID</th>
                        <th>Teacher Name</th>
                        <th>Q No</th>
                        <th>Question</th>
                        <th>Option 1</th>
                        <th>Option 2</th>
                        <th>Option 3</th>
                        <th>Option 4</th>
                        <th>Right Option</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach($question as $ques)
                    <tr>
                        <td>{{$ques->id}}</td>
                        <td>{{$ques->exam_id}}</td>
                        <td>{{$ques->exam_name}}</td>
                        <td>{{$ques->teacher_id}}</td>
                        <td>{{$ques->teacher}}</td>
                        <td>{{$ques->id}}</td>
                        <td>{{$ques->question}}</td>
                        <td>{{$ques->op_1}}</td>
                        <td>{{$ques->op_2}}</td>
                        <td>{{$ques->op_3}}</td>
                        <td>{{$ques->op_4}}</td>
                        <td>{{$ques->r_op}}</td>
                        <td>
                            <div class="edit-btn">
                                <a href="" data-toggle="modal" data-target="#modalUpdateQuestion">
                                    <ion-icon name="create-outline"></ion-icon>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="delete-btn">
                                <a href="{{url('question_delete/'.$ques->id) }}" class="btn btn-danger">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <!-- Modal -->
                <div class="modal fade" id="modalUpdateQuestion" tabindex="-1" role="dialog" aria-labelledby="modalUpdateQuestion" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalUpdateQuestionTitle">Update Question</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <div class="mb-3">
                                    @foreach($questions as $que)
                                    <form action="{{ url('update_question_data/'.$que->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <label for="exam_id">Exam ID :</label>
                                        <input class="form-control" id="exam_id" name="exam_id" value="{{$que->exam_id}}" type="number"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Exam ID">

                                        <label for="exam_name">Exam Name :</label>
                                        <input class="form-control" id="exam_name" name="exam_name" value="{{$que->exam_name}}" type="text"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Exam Name">

                                        <label for="q_name">Question :</label>
                                        <input class="form-control" id="question" name="question" value="{{$que->question}}" type="text"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Question">

                                        <label for="op_1">Option 1 :</label>
                                        <input class="form-control" id="op_1" name="op_1" value="{{$que->op_1}}" type="text"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter option 1">

                                        <label for="op_2">Option 2 :</label>
                                        <input class="form-control" id="op_2" name="op_2" value="{{$que->op_2}}" type="text"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter option 2">

                                        <label for="op_3">Option 3 :</label>
                                        <input class="form-control" id="op_3" name="op_3" value="{{$que->op_3}}" type="text" 
                                        required="" autofocus="" autocomplete="" placeholder="Enter option 3">

                                        <label for="op_4">Option 4 :</label>
                                        <input class="form-control" id="op_4" name="op_4" value="{{$que->op_4}}" type="text"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter option 4">

                                        <label for="r_op">Right Option :</label>
                                        <select class="form-control" id="r_op" name="r_op">
                                            <option value="" selected disabled>Choose Your Option</option>
                                            <option value="op_1">Option 1</option>
                                            <option value="op_2">Option 2</option>
                                            <option value="op_3">Option 3</option>
                                            <option value="op_4">Option 4</option>
                                        </select>

                                        <label for="teacher_id">Teacher ID :</label>
                                        <input class="form-control" id="teacher_id" name="teacher_id" value="{{$que->teacher_id}}" type="number"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Teacher ID ">

                                        <label for="teacher">Teacher Name :</label>
                                        <input class="form-control" id="teacher" name="teacher" value="{{$que->teacher}}" type="text"  
                                        required="" autofocus="" autocomplete="" placeholder="Enter Teacher Name">

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary add-btn">Update  Question</button>
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

        //tabsToggle
        let tabOptions = document.querySelectorAll('.tabs_button');
        let tabsList = document.querySelectorAll('.exam_tabs');

        function activeTab(a){
            tabsList.forEach((item) =>
            item.classList.remove('exam_tabs_active'));
            console.log(a);
            document.querySelector(a).classList.add('exam_tabs_active');
        }

        function activeTabOption(){
            tabOptions.forEach((item) => 
            item.classList.remove('active_tab_button'));
            this.classList.add('active_tab_button');
            let val = this.getAttribute('data-tab-target');
            activeTab(val);
        }
        tabOptions.forEach((item) =>
        item.addEventListener('click', activeTabOption));

        tabOptions.forEach((item) =>
        item.getAttribute('target')
        );


    </script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script>
      $(document).ready(function() {
          $("body").on("contextmenu", function(e) {
              return false;
            });
        });
    </script>
    
</body>
</html>