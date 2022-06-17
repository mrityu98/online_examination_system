<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Examination System</title>

    <!-- BootStrap -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />

    <!-- CSS -->
    <link rel="stylesheet" href="css/exam-style.css">
    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <style>
      .unselectable 
      {
        -webkit-user-select: none;
        -webkit-touch-callout: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      /* Google fonts */
      @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,500&display=swap');

      /* main */
      html 
      {
        scroll-behavior: smooth;
      }
      *
      {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
      }

      :root
      {
        --blue: #2c2992;
        --blue-light: #3f3acf;
        --white: #fff;
        --grey: #f5f5f5;
        --black1: #222;
        --black2: #999;
      }

      body
      {
        min-height: 100vh;
        overflow-x: hidden;
      }

      .unselectable 
      {
        -webkit-user-select: none;
        -webkit-touch-callout: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      .exam-header
      {
        margin: 10px 20px;
        display: flex;
        position: sticky;
        top: 0;
        align-content: space-between;
        background-color: #fff;
        border-bottom: 1px solid var(--blue);
      }
      .header
      {
        font-size: 1.7rem;
        font-weight: 600;
        color: var(--blue);
      }
      .timer
      {
        margin-left: auto;
        height:max-content;
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--blue);
        border: 1px solid var(--blue-light);
        border-radius: 10px;
        right: 0;
      }
      #timer
      {
        margin-bottom: 0;
        padding: 12px;
      }

      /* start exam */

      .start-exam
      {
        z-index: 10;
        position: fixed;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
      }

      .start-exam ul
      {
        font-size: 1.2rem;
      }

      .btn
      {
        font-size: 1.5rem;
        background-color: var(--blue);
        border: none;
      }
      .btn:hover
      {
        background-color: var(--blue-light);
      }


      /* exam */
      .exam-questions
      {
        margin: 50px 40px 50px 40px;
      }

      .question-header
      {
        display: flex;
      }
      .question-number
      {
        margin-left: 0;
        margin-right: 20px;
        font-size: 1.2rem;
        font-weight: 500;
      }

      .question
      {
        font-size: 1.2rem;
        font-weight: 500;
      }

      .options
      {
        margin-left: 25px;
        margin-bottom: 25px;
      }

      .options li
      {
        list-style: none;
      }

      input, .options label
      {
        cursor: pointer;
      }

      .submit
      {
        text-align: center;
      }

      .submit button
      {
        background-color: var(--blue);
        width: 130px;
        height: 40px;
        margin: 5px;
        border-radius: 20px;
        border: none;
        font-size: 1.4rem;
        font-weight: 500;
        color: white;
        cursor: pointer;
      }
      .submit button:hover
      {
        background-color: var(--blue-light);
      }

      /* not started */
      .not-started
      {
        z-index: 10;
        position: fixed;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        font-size: 1.5rem;
      }
      .not-started span
      {
        font-weight: 800;
      }

      /* exam-enabled */
      .exam-disabled
      {
        z-index: 10;
        position: fixed;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        font-size: 1.5rem;
      }

      /* exam-ended */
      .exam-ended
      {
        z-index: 10;
        position: fixed;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        font-size: 1.5rem;
      }

      .no-display
      {
        display: none;
      }

      #refresh1, #refresh2
      {
        cursor: pointer;
      }
    </style>
  </head>
  <body class="unselectable">
    <!-- header -->
    @foreach($exam as $examm)
       
            <section class="exam-header">
            <div>
              <div class="header">
                <div class="exam-name">{{$examm->name}}</div>
              </div>
              <div class="exam-info">
                <div class="col-md-8">
                  <span class="total-questions">{{$examm->t_question}}</span> Questions,
                  <span class="total-marks">{{$examm->t_question*1}} Marks</span>
                </div>
                <div class="col-md-4">
                  <div class="time"></div>
                </div>
              </div>
            </div>
            <div class="timer">
              <p id="timer"></p>
            </div>
            </section>
    @endforeach

    <!-- start exam -->
    <div class="start-exam no-display" id="start-exam">
      <button type="button" class="btn btn-primary" id="start-exam-btn">
        Start Exam
      </button>
      <ul>
        Do NOT close fullscreen during exam</li>
      </ul>
    </div>

    <!-- questions -->

    @foreach($exam1 as $exa)
        @if($exa->id==1)
    
    <section class="exam-questions" id="exam-questions">
      <form action="{{route('result_store')}}" method="POST">
        @csrf
            <div>
              <label for="user_id">Your ID : </label>
              <select name="user_id">
                  <option value="" selected disabled>Your ID : </option>
                  <option value="{{Auth::user()->id}}">{{Auth::user()->id}}</option>
              </select>
              <label for="name">Your Name :</label>
              <select name="name">
                  <option value="" selected disabled>Your Name</option>
                  <option value="{{Auth::user()->name}}">{{Auth::user()->name}}</option>
              </select>
              @foreach($exam as $exam)
              <label for="exam_id">Exam ID : </label>
              <select name="exam_id">
                  <option value="" selected disabled>Exam ID : </option>
                  <option value="{{$exam->id}}">{{$exam->id}}</option>
              </select>
              <label for="exam_name">Exam Name : </label>
              <select name="exam_name">
                  <option value="" selected disabled>Exam Name : </option>
                  <option value="{{$exam->name}}">{{$exam->name}}</option>
              </select>
              @endforeach
            </div>
      @foreach($ques1 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q1">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques2 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q2">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques3 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q3">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques4 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q4">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques5 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q5">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques6 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q6">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques7 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q7">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques8 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q8">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques9 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q9">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques10 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q10">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques11 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q11">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques12 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q12">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques13 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q13">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques14 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q14">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques15 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q15">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques16 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q16">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques17 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q17">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques18 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q18">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques19 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q19">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques20 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q20">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques21 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q21">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques22 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q22">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques23 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q23">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques24 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q24">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques25 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q25">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
            <div class="submit">
              <button type="submit" class="submit-answers">Submit</button>
            </div>
          @endif
        @endforeach
      </form>
    </section>

    @foreach($exam3 as $exam)
        @if($exam->id==3)

    <section class="exam-questions3" id="exam-questions3">
      <form action="{{route('result_store')}}" method="POST">
        @csrf
            <div>
              <label for="user_id">Your ID : </label>
              <select name="user_id">
                  <option value="" selected disabled>Your ID : </option>
                  <option value="{{Auth::user()->id}}">{{Auth::user()->id}}</option>
              </select>
              <label for="name">Your Name :</label>
              <select name="name">
                  <option value="" selected disabled>Your Name</option>
                  <option value="{{Auth::user()->name}}">{{Auth::user()->name}}</option>
              </select>
              @foreach($exam2 as $exam1)
              <label for="exam_id">Exam ID : </label>
              <select name="exam_id">
                  <option value="" selected disabled>Exam ID : </option>
                  <option value="{{$exam1->id}}">{{$exam1->id}}</option>
              </select>
              <label for="exam_name">Exam Name : </label>
              <select name="exam_name">
                  <option value="" selected disabled>Exam Name : </option>
                  <option value="{{$exam1->name}}">{{$exam1->name}}</option>
              </select>
              @endforeach
            </div>
            
      @foreach($ques51 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q1">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques52 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q2">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques53 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q3">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques54 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q4">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques55 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q5">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques56 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q6">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques57 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q7">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques58 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q8">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques59 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q9">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques60 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q10">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques61 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q11">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques62 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q12">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques63 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q13">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques64 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q14">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques65 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q15">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques66 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q16">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques67 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q17">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques68 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q18">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques69 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q19">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques70 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q20">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques71 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q21">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques72 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q22">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques73 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q23">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques74 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q24">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques75 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q25">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        <div class="submit">
          <button type="submit" class="submit-answers">Submit</button>
        </div>
      </form>
      @endif
      @endforeach
    </section>

    @foreach($exam2 as $ex2)
        @if($ex2->id==2)

    <section class="exam-questions2" id="exam-questions2">
      <form action="{{route('result_store')}}" method="POST">
        @csrf
            <div>
              <label for="user_id">Your ID : </label>
              <select name="user_id">
                  <option value="" selected disabled>Your ID : </option>
                  <option value="{{Auth::user()->id}}">{{Auth::user()->id}}</option>
              </select>
              <label for="name">Your Name :</label>
              <select name="name">
                  <option value="" selected disabled>Your Name</option>
                  <option value="{{Auth::user()->name}}">{{Auth::user()->name}}</option>
              </select>
              @foreach($exam2 as $exam1)
              <label for="exam_id">Exam ID : </label>
              <select name="exam_id">
                  <option value="" selected disabled>Exam ID : </option>
                  <option value="{{$exam1->id}}">{{$exam1->id}}</option>
              </select>
              <label for="exam_name">Exam Name : </label>
              <select name="exam_name">
                  <option value="" selected disabled>Exam Name : </option>
                  <option value="{{$exam1->name}}">{{$exam1->name}}</option>
              </select>
              @endforeach
            </div>
            
      @foreach($ques26 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q1">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques27 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q2">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques28 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q3">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques29 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q4">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques30 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q5">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques31 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q6">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques32 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q7">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques33 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q8">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques34 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q9">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques35 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q10">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques36 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q11">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques37 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q12">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques38 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q13">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques39 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q14">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques40 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q15">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques41 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q16">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques42 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q17">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques43 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q18">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques44 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q19">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques45 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q20">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques46 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q21">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques47 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q22">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques48 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q23">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques49 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q24">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques50 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q25">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        <div class="submit">
          <button type="submit" class="submit-answers">Submit</button>
        </div>
      </form>
      @endif
      @endforeach
    </section>


    @foreach($exam4 as $ex4)
        @if($ex4->id==4)

    <section class="exam-questions4" id="exam-questions4">
      <form action="{{route('result_store')}}" method="POST">
        @csrf
            <div>
              <label for="user_id">Your ID : </label>
              <select name="user_id">
                  <option value="" selected disabled>Your ID : </option>
                  <option value="{{Auth::user()->id}}">{{Auth::user()->id}}</option>
              </select>
              <label for="name">Your Name :</label>
              <select name="name">
                  <option value="" selected disabled>Your Name</option>
                  <option value="{{Auth::user()->name}}">{{Auth::user()->name}}</option>
              </select>
              @foreach($exam4 as $exa4)
              <label for="exam_id">Exam ID : </label>
              <select name="exam_id">
                  <option value="" selected disabled>Exam ID : </option>
                  <option value="{{$exa4->id}}">{{$exa4->id}}</option>
              </select>
              <label for="exam_name">Exam Name : </label>
              <select name="exam_name">
                  <option value="" selected disabled>Exam Name : </option>
                  <option value="{{$exa4->name}}">{{$exa4->name}}</option>
              </select>
              @endforeach
            </div>
            
      @foreach($ques76 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q1">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques77 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q2">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques78 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q3">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques79 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q4">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques80 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q5">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques81 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q6">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques82 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q7">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques83 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q8">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques84 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q9">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques85 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q10">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques86 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q11">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques87 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q12">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques88 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q13">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques89 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q14">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques90 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q15">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques91 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q16">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques92 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q17">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques93 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q18">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques94 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q19">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques95 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q20">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques96 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q21">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques97 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q22">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques98 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q23">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques99 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q24">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        @foreach($ques100 as $ques)
        <div class="questions">
          <div class="question-header">
            <div class="question-number">{{$i++}}.</div>
            <div class="question">
              {{$ques->question}}
            </div>
          </div>
          <div class="options">
            <select name="q25">
              <option value="" selected disabled>Choose Your Option</option>
              <option value="op_1">{{$ques->op_1}}</option>
              <option value="op_2">{{$ques->op_2}}</option>
              <option value="op_3">{{$ques->op_3}}</option>
              <option value="op_4">{{$ques->op_4}}</option>
            </select>
          </div>
        </div>
        @endforeach
        <div class="submit">
          <button type="submit" class="submit-answers">Submit</button>
        </div>
      </form>
      @endif
      @endforeach
    </section>


    <!-- not started -->
    <div class="not-started" id="not-started">
      Exam not started. <span> Refresh at exam time to load exam.</span>
    </div>

    <!-- exam-disabled -->
    <div class="exam-disabled" id="disabled">
      Exam disabled due to exiting fullscreen. <span id="refresh" style="color: #2c2992; cursor: pointer;">Refresh</span> page.
    </div>

    <!-- ended -->
    <div class="exam-ended" id="ended">
      Exam Ended. Back to <a href="{{ route('student_dashboard') }}"> Dashboard </a>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
      let elem = document.documentElement;

      $(document).ready(function () {
        console.log("ready");
        // $("#start-exam").hide();
        $("#not-started").hide();
        $("#exam-questions").hide();
        $("#exam-questions2").hide();
        $("#exam-questions3").hide();
        $("#exam-questions4").hide();
        $("#disabled").hide();
        $("#ended").hide();
      });

      $("#start-exam-btn").click(function () {
        console.log("clicked");
        $("#exam-questions").show();
        $("#exam-questions2").show();
        $("#exam-questions3").show();
        $("#exam-questions4").show();
        $("#start-exam").hide();
        openFullscreen();
        setInterval(checkFullScrren, 1000);
      });

      $('#refresh').click(function(){
        location.reload();
      });

      function checkFullScrren() {
        if (
          window.fullScreen ||
          (window.innerWidth == screen.width &&
            window.innerHeight == screen.height)
        ) {
          console.log("fullscreen");
        } else {
          console.log("not fullscreen");
          endExam();
        }
      }

      /* Function to open fullscreen mode */
      function openFullscreen() {
        if (elem.requestFullscreen) {
          elem.requestFullscreen();
        } else if (elem.mozRequestFullScreen) {
          /* Firefox */
          elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullscreen) {
          /* Chrome, Safari & Opera */
          elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) {
          /* IE/Edge */
          elem = window.top.document.body; //To break out of frame in IE
          elem.msRequestFullscreen();
        }
      }

      function endExam() {
        $("#exam-questions").hide();
        $("#exam-questions2").hide();
        $("#exam-questions3").hide();
        $("#exam-questions4").hide();
        $("#disabled").show();
      }

      // timer

      @foreach($time1 as $exam)
      
      var destination = new Date("{{$exam->date}}, {{$exam->start_time}}").getTime(); //exam end time

      @endforeach

      var x = setInterval(function () {
        var now = new Date().getTime();

        var difference = destination - now;

        var days = Math.floor(difference / (1000 * 60 * 60 * 24));
        var hours = Math.floor(
          (difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
        );
        console.log(hours);
        var minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((difference % (1000 * 60)) / 1000);

        if (hours >= 1){  //exam duration
          document.getElementById("timer").innerText = "exam not started";
          $("#not-started").show();
          $("#start-exam").hide();
        }else if(seconds >= 0) {
          document.getElementById("timer").innerText =
            days +
            "d, " +
            hours +
            "hrs : " +
            minutes +
            "min : " +
            seconds +
            "s Left";
            $("#not-started").hide();
            // $("#start-exam").show();
            $('#start-exam').removeClass('no-display');
        }else{
          document.getElementById("timer").innerText = "Exam Time Over";
          $("#start-exam").hide();
          $("#ended").show();
          $("#exam-questions").hide();
          $("#exam-questions2").hide();
          $("#exam-questions3").hide();
          $("#exam-questions4").hide();
          $("#disabled").hide();
        }
      }, 1000);
    </script>
    <script>
      $(document).ready(function() {
          $("body").on("contextmenu", function(e) {
              return false;
            });
        });
    </script>
  </body>
</html>