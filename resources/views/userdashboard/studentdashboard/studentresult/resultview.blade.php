<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Examination System</title>

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />

    <style>
      /* Google fonts */
      @import url("https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,500;0,700;1,100;1,500;1,700&display=swap");

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Raleway", sans-serif;
      }

      :root {
        --blue: #2c2992;
        --blue-light: #3f3acf;
        --white: #fff;
        --grey: #f5f5f5;
        --black1: #222;
        --black2: #999;
      }

      body {
        min-height: 100vh;
        overflow-x: hidden;
      }

      /* nav */

      .containerr {
        position: relative;
        width: 100%;
      }
      .navigation {
        position: fixed;
        width: 300px;
        height: 100%;
        background: var(--blue);
        border-left: 10px solid var(--blue);
        transition: 0.5s;
        overflow: hidden;
      }

      .navigation.active {
        width: 80px;
      }

      .navigation ul {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
      }

      .navigation ul li {
        position: relative;
        width: 100%;
        list-style: none;
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px;
      }

      .navigation ul li:hover,
      .navigation ul li.clicked {
        background: var(--white);
      }

      .navigation ul li:nth-child(1) {
        margin-bottom: 40px;
        pointer-events: none;
      }

      .navigation ul li a {
        position: relative;
        width: 100%;
        display: flex;
        text-decoration: none;
        color: var(--white);
      }
      .navigation ul li:hover a,
      .navigation ul li.clicked a {
        color: var(--blue);
      }

      .navigation ul li a .icon {
        position: relative;
        display: block;
        min-width: 60px;
        height: 60px;
        line-height: 70px;
        text-align: center;
      }

      .navigation ul li a .icon ion-icon {
        font-size: 1.75em;
      }

      .navigation ul li a .title {
        position: relative;
        display: block;
        padding: 0 10px;
        height: 60px;
        line-height: 60px;
        text-align: start;
        white-space: nowrap;
      }

      .navigation ul li:hover a::before,
      .navigation ul li.clicked a::before {
        content: "";
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
      .navigation ul li.clicked a::after {
        content: "";
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
      .main {
        position: absolute;
        width: calc(100% - 300px);
        left: 300px;
        min-height: 100vh;
        background: var(--white);
        transition: 0.5s;
      }
      .main.active {
        width: calc(100% - 80px);
        left: 80px;
      }

      .topbar {
        width: 100%;
        height: 60px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 10px;
        color: var(--black2);
      }

      .toggle {
        position: relative;
        width: 60px;
        height: 60px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 2.5em;
        cursor: pointer;
      }

      .role {
        font-size: 1.1em;
      }

      .user {
        position: relative;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        overflow: hidden;
        cursor: pointer;
      }

      .user img {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        object-fit: cover;
      }

      /* result_details */
      .result_details-header {
        margin: 10px 30px 40px 30px;
        font-size: 32px;
        font-weight: 700;
        color: var(--blue);
      }

      .result_details {
        margin: 10px 30px 0 30px;
      }

      .result_details_full {
        padding: 20px;
        font-size: 24px;
        font-weight: 500;
        border: 1px solid var(--blue-light);
        /* text-align: center; */
      }

      .student_details {
        margin-bottom: 20px;
        text-align: center;
        font-weight: 600;
        /* border: 1px solid blue; */
      }

      table {
        border-collapse: collapse;
        /* margin: 0px 30px 15px; */
        width: 100%;
      }

      table,
      th,
      td {
        border: #2c2992 1px solid;
      }

      table th,
      table td {
        text-align: center;
        padding: 5px;
      }

      table td {
        font-size: 16px;
      }

      table .obtained_marks {
        font-size: 20px;
        font-weight: 600;
      }

      .btn {
        background-color: var(--blue);
      }
      .btn:hover {
        background-color: var(--blue-light);
      }

      .print_result {
        text-align: center;
      }
      .print_result_btn {
        margin: 10px;
      }

      /* Responsive */
      @media (max-width: 990px) {
        .navigation {
          width: 300px;
          left: 0;
        }
        .navigation.active {
          left: -300px;
        }
        .main {
          left: 300px;
        }
        .main.active {
          width: 100%;
          left: 0;
        }
      }

      @media (max-width: 768px) {
      }

      @media (max-width: 480px) {
        .navigation {
          width: 100%;
          left: -100%;
          z-index: 1000;
        }
        .navigation.active {
          width: 100%;
          left: 0;
        }
        .toggle {
          z-index: 10001;
        }
        .main.active .toggle {
          right: 0;
          left: initial;
          color: var(--white);
        }
      }
    </style>

    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
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
          <div class="role">Hello Student {{Auth::user()->name}}</div>
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
        @foreach($exam as $exam)
        <div class="result_details-header">Exam Name: {{$exam->name}}</div>
        <div class="result_details" id="result_details">
          <div class="result_details_full" id="result_details_full">
            <div class="student_details">
              Student Name:&nbsp; {{Auth::user()->name}}
              <br />
              Roll Number: &nbsp; {{Auth::user()->roll}}
              <br />
              Class: &nbsp; {{Auth::user()->department}} {{Auth::user()->year}} Year {{Auth::user()->semester}} Sem
            </div>

            <?php $count=0  ?>

                  @foreach($result1 as $result1)
                      @foreach($que1 as $que)
                          @if($result1->q1==$que->r_op)
                              <?php ++$count ?>
                           @else
                              <?php $count=$count-.25 ?>
                          @endif
                      @endforeach
                  @endforeach

                  @foreach($result2 as $result2)
                      @foreach($que2 as $que)
                          @if($result2->q2==$que->r_op)
                              <?php ++$count ?>
                          @else
                              <?php $count=$count-.25 ?>
                          @endif
                      @endforeach
                  @endforeach
                  
                  @foreach($result3 as $result3)
                      @foreach($que3 as $que)
                          @if($result3->q3==$que->r_op)
                              <?php ++$count ?>
                          @else
                              <?php $count=$count-.25 ?>
                          @endif
                      @endforeach
                  @endforeach

                  @foreach($result4 as $result4)
                      @foreach($que4 as $que)
                          @if($result4->q4==$que->r_op)
                              <?php ++$count ?>
                          @else
                              <?php $count=$count-.25 ?>
                          @endif
                      @endforeach
                  @endforeach

                  @foreach($result5 as $result5)
                      @foreach($que5 as $que)
                          @if($result5->q5==$que->r_op)
                              <?php ++$count ?>
                          @else
                              <?php $count=$count-.25 ?>
                          @endif
                      @endforeach
                  @endforeach

                  @foreach($result6 as $result6)
                      @foreach($que6 as $que)
                          @if($result6->q6==$que->r_op)
                              <?php ++$count ?>
                          @else
                              <?php $count=$count-.25 ?>
                          @endif
                      @endforeach
                  @endforeach

                  @foreach($result7 as $result7)
                      @foreach($que7 as $que)
                          @if($result7->q7==$que->r_op)
                              <?php ++$count ?>
                          @else
                              <?php $count=$count-.25 ?>
                          @endif
                      @endforeach
                  @endforeach

                  @foreach($result8 as $result8)
                      @foreach($que8 as $que)
                          @if($result8->q8==$que->r_op)
                              <?php ++$count ?>
                          @else
                              <?php $count=$count-.25 ?>
                          @endif
                      @endforeach
                  @endforeach

                  @foreach($result9 as $result9)
                      @foreach($que9 as $que)
                          @if($result9->q9==$que->r_op)
                              <?php ++$count ?>
                          @else
                              <?php $count=$count-.25 ?>
                          @endif
                      @endforeach
                  @endforeach

                  @foreach($result10 as $result10)
                      @foreach($que10 as $que)
                          @if($result10->q10==$que->r_op)
                              <?php ++$count ?>
                          @else
                              <?php $count=$count-.25 ?>
                          @endif
                      @endforeach
                  @endforeach

                  @foreach($result11 as $result11)
                      @foreach($que11 as $que)
                          @if($result11->q11==$que->r_op)
                              <?php ++$count ?>
                          @else
                              <?php $count=$count-.25 ?>
                          @endif
                      @endforeach
                  @endforeach

                  @foreach($result12 as $result12)
                      @foreach($que12 as $que)
                          @if($result12->q4==$que->r_op)
                              <?php ++$count ?>
                          @else
                              <?php $count=$count-.25 ?>
                          @endif
                      @endforeach
                  @endforeach

                  @foreach($result13 as $result13)
                      @foreach($que13 as $que)
                          @if($result13->q13==$que->r_op)
                              <?php ++$count ?>
                          @else
                              <?php $count=$count-.25 ?>
                          @endif
                      @endforeach
                  @endforeach

                  @foreach($result14 as $result14)
                      @foreach($que14 as $que)
                          @if($result14->q14==$que->r_op)
                              <?php ++$count ?>
                          @else
                              <?php $count=$count-.25 ?>
                          @endif
                      @endforeach
                  @endforeach

                  @foreach($result15 as $result15)
                      @foreach($que15 as $que)
                          @if($result15->q15==$que->r_op)
                              <?php ++$count ?>
                          @else
                              <?php $count=$count-.25 ?>
                          @endif
                      @endforeach
                  @endforeach

                  @foreach($result16 as $result16)
                      @foreach($que16 as $que)
                          @if($result16->q16==$que->r_op)
                              <?php ++$count ?>
                          @else
                              <?php $count=$count-.25 ?>
                          @endif
                      @endforeach
                  @endforeach

                  @foreach($result17 as $result17)
                      @foreach($que17 as $que)
                          @if($result17->q17==$que->r_op)
                              <?php ++$count ?>
                          @else
                              <?php $count=$count-.25 ?>
                          @endif
                      @endforeach
                  @endforeach

                  @foreach($result18 as $result18)
                      @foreach($que18 as $que)
                          @if($result18->q18==$que->r_op)
                              <?php ++$count ?>
                          @else
                              <?php $count=$count-.25 ?>
                          @endif
                      @endforeach
                  @endforeach

                  @foreach($result19 as $result19)
                      @foreach($que19 as $que)
                          @if($result19->q19==$que->r_op)
                              <?php ++$count ?>
                          @else
                              <?php $count=$count-.25 ?>
                          @endif
                      @endforeach
                  @endforeach

                  @foreach($result20 as $result20)
                      @foreach($que20 as $que)
                          @if($result20->q20==$que->r_op)
                              <?php ++$count ?>
                          @else
                              <?php $count=$count-.25 ?>
                          @endif
                      @endforeach
                  @endforeach

                  @foreach($result21 as $result21)
                      @foreach($que21 as $que)
                          @if($result21->q21==$que->r_op)
                              <?php ++$count ?>
                          @else
                              <?php $count=$count-.25 ?>
                          @endif
                      @endforeach
                  @endforeach

                  @foreach($result22 as $result22)
                      @foreach($que22 as $que)
                          @if($result22->q22==$que->r_op)
                              <?php ++$count ?>
                          @else
                              <?php $count=$count-.25 ?>
                          @endif
                      @endforeach
                  @endforeach

                  @foreach($result23 as $result23)
                      @foreach($que23 as $que)
                          @if($result23->q23==$que->r_op)
                              <?php ++$count ?>
                          @else
                              <?php $count=$count-.25 ?>
                          @endif
                      @endforeach
                  @endforeach

                  @foreach($result24 as $result24)
                      @foreach($que24 as $que)
                          @if($result24->q24==$que->r_op)
                              <?php ++$count ?>
                          @else
                              <?php $count=$count-.25 ?>
                          @endif
                      @endforeach
                  @endforeach

                  @foreach($result25 as $result25)
                      @foreach($que25 as $que)
                          @if($result25->q25==$que->r_op)
                              <?php ++$count ?>
                          @else
                              <?php $count=$count-.25 ?>
                          @endif
                      @endforeach
                  @endforeach

            <table>
              <tr>
                <td>Exam Name</td>
                <td>{{$exam->name}}</td>
              </tr>
              <tr>
                <td>Subject</td>
                <td>{{$exam->subject}}</td>
              </tr>
              <tr>
                <td>Exam Date</td>
                <td>{{$exam->date}}</td>
              </tr>
              <tr>
                <td>Exam Time</td>
                <td>{{$exam->start_time}}</td>
              </tr>
              <tr>
                <td>Duration</td>
                <td>{{$exam->duration}}</td>
              </tr>
              <tr>
                <td>Total Questions</td>
                <td>{{$exam->t_question}}</td>
              </tr>
              <tr>
                <td>Marks for right answer</td>
                <td>{{$exam->r_mark}}</td>
              </tr>
              <tr>
                <td>Negative marks</td>
                <td>{{$exam->n_mark}}</td>
              </tr>
              <tr>
                <td>Full Marks</td>
                <td>{{$exam->t_question * $exam->r_mark}}</td>
              </tr>
              <tr class="obtained_marks">
                <td>Obtained Marks</td>
                <td>{{$count}}</td>
              </tr>
            </table>
          </div>
          @endforeach
        </div>
        <div class="print_result">
              <button class="btn btn-primary print_result_btn" onclick="printElement('result_details', 'result')">Print Result</button>
            </div>
      </div>
    </div>

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

    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>

    <script>
      //menuToggle
      let toggle = document.querySelector(".toggle");
      let navigation = document.querySelector(".navigation");
      let main = document.querySelector(".main");

      toggle.onclick = function () {
        navigation.classList.toggle("active");
        main.classList.toggle("active");
      };

      //add hovered class in selected list item
      let list = document.querySelectorAll(".navigation li");
      function activeLink() {
        list.forEach((item) => item.classList.remove("clicked"));
        this.classList.add("clicked");
      }
      list.forEach((item) => item.addEventListener("click", activeLink));
    </script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <script>
      function printElement(elem, title) {
        var popup = window.open("", "PRINT", "height=600,width=900");
        popup.document.write(
          "<html><head><title>" +
            title +
            "</title><style>body {font-family: Arial; text-align: center;} .result_details_full {margin: 40px 30px 0 30px; font-size: 24px;font-weight: 500;} .student_details {margin-bottom: 40px;text-align: center;font-weight: 600;} table {width: 100%; border-collapse: collapse;}table,td{border: #2c2992 1px solid;}table td{text-align: center;padding: 5px;font-size: 16px;} table .obtained_marks {font-size: 20px;font-weight: 600;} </style>");
        popup.document.write("</head><body >");
        popup.document.write(document.getElementById(elem).innerHTML);
        popup.document.write("</body></html>");
        popup.document.close();
        popup.focus();
        popup.print();
        popup.close();
        return true;
      }
    </script>
  </body>
</html>