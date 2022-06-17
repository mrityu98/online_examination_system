<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Examination System</title>
    <link rel="stylesheet" type="text/css" href="{{url('./css/stylee.css')}}"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
       
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.3.6/sweetalert2.min.js" integrity="sha512-DyFdigPSyUbsT1ioYelAc+l6T6s2QB9OZv48jBpr589vTJWRmclLAl1sOZ560bOhwwi9Aewr/VrcPLiTXM5W/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>


.navbar a {
  float: left;
  font-size: 16px;
  color: black;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown .dropbtn {
  cursor: pointer;
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding:7px 14px 7px 14px;
  background-color: inherit;
  font-family: inherit;
}



.dropdown-content {
  display: none;
  position: absolute;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: center;
}

.dropdown-content:hover {
  background-color: black;
}
.dropdown:hover .dropbtn {
  background-color: rgba(255, 99, 71, 0.5);
}

.show {
  display: block;
}
.Register {
  display: block;
}
</style>
</head>
<body>
    <header>
        <div class="wrapper">
            <div class="logo">
                <img src="https://i.postimg.cc/mg4rWBmv/logo.png" alt="kpk">
            </div>
            <ul class="nav-area">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Devolopers</a></li>
                <li>
                    <div class="dropdown">
                        <button class="dropbtn" onclick="LoginFunction()">LOGIN
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content" id="LoginDropdown">
                            <a href="{{ route('student_login') }}">STUDENT</a>
                            <a href="{{ route('teacher_login') }}">TEACHER</a>
                            <a href="{{ route('admin_login') }}">ADMIN</a>
                        </div>
                    </div>  
                </li>   
                <li>
                    <div class="dropdown">
                        <button class="dropbtn" onclick="RegisterFunction()">REGISTER
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content" id="RegisterDropdown">
                            <a href="{{ route('studentregister') }}">STUDENT</a>
                            <a href="{{ route('teacherregister') }}">TEACHER</a>
                            <!-- <a href="{{ route('adminregister') }}">ADMIN</a> -->
                        </div>
                    </div>  
                </li>
            </ul>                  
        </div>
    </header>


   

    <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
        function LoginFunction()
        {
            document.getElementById("LoginDropdown").classList.toggle("show");
        }

// Close the dropdown if the user clicks outside of it
        window.onclick = function(a)
        {
            if (!a.target.matches('.dropbtn'))
            {
                var myDropdown = document.getElementById("LoginDropdown");
                if (myDropdown.classList.contains('show')) 
                {
                    myDropdown.classList.remove('show');
                }
            }
        }
</script>

<script>
        function RegisterFunction()
        {
            document.getElementById("RegisterDropdown").classList.toggle("Register");
        }

        window.onclick = function(e)
        {
            if (!e.target.matches('.dropbtn'))
            {
                var myDropdown = document.getElementById("RegisterDropdown");
                if (myDropdown.classList.contains('Register')) 
                {
                    myDropdown.classList.remove('Register');
                }
            }
        }
    </script>

</body>
</html>