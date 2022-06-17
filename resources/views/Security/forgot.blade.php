<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <title>Forgot Password</title>
    </head>
    <body>
        <form action="{{route('forgot_password')}}" method="post">
            @csrf

            <input type="email" name="email" id="email">
            @if(session('error'))
                <div>
                    {{session('error')}}
                </div>
            @endif
            @if(session('success'))
                <div>
                    {{session('success')}}
                </div>
            @endif
            <button type="submit">Submit</button>

        </form>
    </body>
</html>