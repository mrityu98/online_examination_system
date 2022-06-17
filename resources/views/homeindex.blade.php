
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Examination System</title>
    
    <!-- BootStrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--==================== UNICONS ====================-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- <link rel="stylesheet" href="css/contact.css"> -->
    <!-- favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="x-icon">
    <script src="https://kit.fontawesome.com/87801205b4.js" crossorigin="anonymous"></script>
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
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('features') }}">Features</a>
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
                    <a class="nav-link" href="{{ route('about') }}">About Us</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </section>

    <!-- Home -->
    <section class="home">
      <div class="home__container container grid">
        <div class="home__text">
          <div class="home__title">
            An Online Examination System For Conducting Exams Securely And Seamlessly
          </div>
          <div class="home__subtitle">
            Objective Tests Platform
          </div>
          <button class="signup-btn">Sign Up</button>
        </div>
        <div class="home__img">
          <img class="home__image" src="oes.jpg" alt="">
        </div>
      </div>
    </section>

    <!-- carousel  -->
    <!-- <section class="caro">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="images/10790.jpg" class="d-block w-100" alt="..." style="height: 200;">
                <div class="carousel-caption d-none d-md-block">
                  <h2>abcd</h2>
                  <p>asdfgh hgc hjds jxj skdhbx hjs jhd</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="images/scott-webb-afd7Sma4iDY-unsplash.jpg" class="d-block w-100" alt="..." style="height: 200;">
                <div class="carousel-caption d-none d-md-block">
                  <h2>dhgc</h2>
                  <p>sfvc hjhbfv  hhbf jhdbgc hb ddbs d</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="images/scott-webb-afd7Sma4iDY-unsplash.jpg" class="d-block w-100" alt="..." style="height: 200;">
                <div class="carousel-caption d-none d-md-block">
                  <h2>hbchj</h2>
                  <p>sgzdc hcbg bh hjjnh jb fdsv cdvf</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </section> -->

    <!-- Features  -->
    <section class="features-quick" id="features">
      <div class="container-fluid">
        <div class="row">
          <div class="feature-box col-lg-4">
            <i class="icon uil uil-laptop"></i>
            <h3>Completely Online</h3>
            <p>Conduct Exams Completely Online</p>
          </div>

          <div class="feature-box col-lg-4">
            <i class="icon uil uil-globe"></i>
            <h3>Accessibility</h3>
            <p>Access from Anywhere</p>
          </div>

          <!-- <div class="feature-box col-lg-3">
            <i class="icon uil uil-webcam"></i>
            <h3>Facial Recognition</h3>
            <p>Increased Security with Biometric Login</p>
          </div> -->

          <div class="feature-box col-lg-4">
            <i class="icon uil uil-auto-flash"></i>
            <h3>Automated</h3>
            <p>Evaluate MCQ questions automatically</p>
          </div>
        </div>
      </div>
    </section>
    <!-- features  -->
    <section class="features">
      <div class="row">
        <div class="solution-box col-sm-4">
          <i class="icon uil uil-graduation-cap"></i>
          <h3>Solution for Colleges</h3>
          <p>Conduct Entrance Exams, End Semester Exams for your students with ease.</p>
        </div>
        <div class="solution-box col-sm-4">
          <i class="icon uil uil-backpack"></i>
          <h3>Solution for Schools</h3>
          <p>Conduct Academic Exams, admission tests</p>
        </div>
        <div class="solution-box col-sm-4">
          <i class="icon uil uil-bag-alt"></i>
          <h3>Solution for Educational Centers</h3>
          <p>Conduct Exams for your large, mid or small Educational Center</p>
        </div>
      </div>
    </section>    

    <!-- Register-login  -->
    <!-- <section class="register-login">
      <div class="get__started">Let's Get Started</div>
      <div class="row">
        <div class="button-column col-sm-6">
          <button type="button" class="login-register-btn">
            <span>Register</span>
          </button>
        </div>
        <div class="button-column col-sm-6">
          <button type="button" class="login-register-btn">
            <span>Login</span>
          </button>
        </div>
      </div>
    </section> -->

    <!-- Footer  -->
    <footer class="footer">
      <div class="footer__bg">
          <div class="footer__container container grid">
              <div>
                  <h1 class="footer__title">Online Examination System</h1>
              </div>

              <ul class="footer__links">
                  <li>
                      <a href="{{ route('features') }}" class="footer__link">Features</a>
                  </li>
                  <li>
                      <a href="{{ route('about') }}" class="footer__link">About Us</a>
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