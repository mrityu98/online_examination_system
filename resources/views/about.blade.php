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
    
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/about.css">
    <!-- favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="x-icon">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
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
                    <a class="nav-link" href="{{ route('home') }}">Contact</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="{{ route('about') }}">About Us</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </section>


    <div class="section">
      <div class="container">
        <div class="title">
          <h1>About us</h1>
        </div>
        <div class="content">
          <div class="article">
            <h3>AJOY KUMAR DAS</h3>
            <p> <b>Ajoy Kumar Das</b> is an aspiring Software Engineer in Information Technology. Now  He is Undergraduate
                in Govt. College of Engineering and Textile Technology  Serampore , under Maulana Abul Kalam Azad University of Technology .
                Specialized in <b>Front-end Web Devolopment</b> and aspiring to be a <b>Full-Stack Devoloper</b> .
            </p>
            <p><b>Project Role : </b> Front-End Devolopment </p>
            <div class="social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.linkedin.com/in/ajoy-kumar-das-06a87b1b8"><i class="fab fa-linkedin"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
          </div>
        </div>
        <div class="image-section">
          <img src="ajay.png" alt="">
        </div>
    </div>


    <div class="section">
      <div class="container">
        <div class="content1">
          <div class="article">
            <h3>AKASH KUNDU</h3>
            <p> <b>Akash Kundu</b> is an aspiring Software Engineer in Information Technology. Now  He is Undergraduate
                in Govt. College of Engineering and Textile Technology  Serampore , under Maulana Abul Kalam Azad University of Technology .
                Specialized in <b>Front-End</b> and aspiring to be a <b>Front-End Devoloper</b> .
                
            </p>
            <p><b>Project Role : </b> Front-End Devolopment </p>
            <div class="social">
                <a href="https://www.facebook.com/profile.php?id=100027795602164"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.linkedin.com/in/akash-kundu-611912204"><i class="fab fa-linkedin"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
          </div>
        </div>
        <div class="image-section">
          <img src="kundu.jpeg" alt="">
        </div>
    </div>

    
    <div class="section">
      <div class="container">
        <div class="content">
          <div class="article">
            <h3>KRISHNA PADA KAR</h3>
            <p> <b>Krishna Pada Kar</b> is an aspiring Software Engineer in Information Technology. Now  He is Undergraduate
                in Govt. College of Engineering and Textile Technology  Serampore , under Maulana Abul Kalam Azad University of Technology .
                Specialized in <b>Front-end and Back-end Web Devolopment</b> in <b>Laravel</b> and aspiring to be a <b>Java Full-Stack Devoloper</b> and 
                Interested in <b>.NET Framework</b>.
            </p>
            <p><b>Project Role : </b> Back-End Devolopment </p>
            <div class="social">
                <a href="https://www.facebook.com/krishna.kar.7792"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.linkedin.com/in/krishna-pada-kar-647223195"><i class="fab fa-linkedin"></i></a>
                <a href="https://www.instagram.com/krishna_kar_1729hrn/?hl=en"><i class="fab fa-instagram"></i></a>
            </div>
          </div>
        </div>
        <div class="image-section">
          <img src="kk.jpg" alt="">
        </div>
    </div>

    <div class="section">
      <div class="container">
        <div class="content1">
          <div class="article">
            <h3>MRITYUNJAY KUMAR CHAUHAN</h3>
            <p> <b>Mrityunjay Kumar Chauhan</b> is an aspiring Software Engineer in Information Technology. Now  He is Undergraduate
                in Govt. College of Engineering and Textile Technology  Serampore , under Maulana Abul Kalam Azad University of Technology .
                Specialized in <b>Django</b> and aspiring to be a <b>Python Full-Stack Devoloper</b> .
                
            </p>
            <p><b>Project Role : </b> Back-End Development </p>
            <div class="social">
                <a href="https://www.facebook.com/mrityunjay.chauhan.94"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.linkedin.com/in/mrityunjay-kumar-chauhan-069669203"><i class="fab fa-linkedin"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
          </div>
        </div>
        <div class="image-section">
          <img src="mora.png" alt="">
        </div>
    </div>

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