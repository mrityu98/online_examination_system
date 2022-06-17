<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Features</title>

    <!-- BootStrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--==================== UNICONS ====================-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- CSS -->
    <link rel="stylesheet" href="css/features-style.css">
    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
    <!-- nav area  -->
    <section class="nav-area">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #442db1;">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">
                <i class="uil uil-graduation-cap nav-logo"></i>
                <span class="brand__name">Online Examination System</span>
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="{{ route('features') }}">Features</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Register
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="{{ route('studentregister') }}">Student</a>
                      <a class="dropdown-item" href="{{ route('teacherregister') }}">Teacher</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Login
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="{{ route('student_login') }}">Student</a>
                      <a class="dropdown-item" href="{{ route('teacher_login') }}">Teacher</a>
                      <a class="dropdown-item" href="{{ route('admin_login') }}">Admin</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Contact</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About Us</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </section>

    <!-- features -->
    <section class="features">
        <div class="features__heading">
            Features
        </div>
        <div class="all__features">
            <div class="feature1">
                <div class="feature__container">
                    <div class="feature__img">
                        <img src="online.jpg" alt="">
                    </div>
                    <div>
                        <div class="feature__desc">
                            <i class="icon uil uil-cloud-check"></i>
                        <div class="feature__title">
                            Completely Online Platform
                        </div>
                        <div class="feature__description">
                            Schedule and conduct exams completely online sitting right at your desk
                        </div>
                    </div>
                </div>
            </div>
            <div class="feature2">
                <div class="feature__container">
                    <div class="feature__img">
                        <img src="anywhere.jpg" alt="">
                    </div>
                    <div>
                        <div class="feature__desc">
                            <i class="icon uil uil-globe"></i>
                        <div class="feature__title">
                            Accessibility
                        </div>
                        <div class="feature__description">
                            Access from anywhere in the world.
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="feature3">
                <div class="feature__container">
                    <div class="feature__img">
                        <img src="facial.jpg" alt="">
                    </div>
                    <div>
                        <div class="feature__desc">
                            <i class="icon uil uil-webcam"></i>
                        <div class="feature__title">
                            Facial Recognition
                        </div>
                        <div class="feature__description">
                            Increased Security with Biometric Login
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="feature4">
                <div class="feature__container">
                    <div class="feature__img">
                        <img src="auto.jpg" alt="">
                    </div>
                    <div>
                        <div class="feature__desc">
                            <i class="icon uil uil-auto-flash"></i>
                        <div class="feature__title">
                            Automated
                        </div>
                        <div class="feature__description">
                            Evaluate MCQ questions automatically
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="feature5">
                <div class="feature__container">
                    <div class="feature__img">
                        <img src="question-bank.jpg" alt="">
                    </div>
                    <div>
                        <div class="feature__desc">
                            <i class="icon uil uil-file-bookmark-alt"></i>
                        <div class="feature__title">
                            Question Banks
                        </div>
                        <div class="feature__description">
                            Create reusable question banks, randomize questions
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        
    </section>


    <!-- Footer  -->
    <footer class="footer">
        <div class="footer__bg">
            <div class="footer__container container grid">
                <div>
                    <h1 class="footer__title">Online Examination System</h1>
                </div>
  
                <ul class="footer__links">
                    <li>
                        <a href="#features" class="footer__link">Features</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">About Us</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Contact</a>
                    </li>
                </ul>
            </div>
  
            <p class="footer__made"> <i class="uil uil-arrow"></i> Made by Ajoy, Krishnapada, Mrityunjay, Akash </p>
        </div>
    </footer>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>