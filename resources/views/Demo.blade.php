<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="Demo.css">
        <title>Online Examination System</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <!-- make a row inside col-md-8 -->
                    <div class="row">
                        <div class="col-md-4">
                            <!-- <h1 class="text-center">Email</h1>
                            <h2 class="text-center">Password</h2> -->
                        </div>
                        <form action="{{ route('login.post') }}" method="POST">
                            @csrf
                            <div class="col-md-6" style="background : rgba(0,0,0,0.8)">
                                <h3 class="text-center">Log In</h3>
                                <input type="email" class="form-control" class="glyphicon glyphicon-envelope" name="email" placeholder="Enter Your Email" required autofocus >
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                <input type="password" class="form-control" name="password" placeholder="Enter Your Password" required autofocus><br>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span><br>
                                    @endif
                                <input type="checkbox" name="remember"> <small>Remember Me</small><br><br>

                                <button type="submit" class="btn btn-info">
                                    Login<span class="glyphicon glyphicon-log-in"></span>
                                </button>

                                <hr>
                                <a href="{{ route('student_login') }}">Forgot Password</a>
                            </div>
                        </form>
                    </div>
                    <!-- close -->
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </body>
</html>