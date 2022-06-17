<!DOCTYPE html>
<html>
<head>
    <title>Capture webcam image with php and jquery</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style>
        #camera
		{ width: 408px; height: 318px; border: 6px solid black; margin-top: 12vh;}
        #but 
        {
            margin-left:460px;
        }
        #results { margin-left:8px;margin-right:125px; border:3px solid;margin-top: 12vh; background:#0d0c0c; }
    </style>
</head>
<body>
  
<div class="container">
    <h1 class="text-center">Face Verification</h1>
    <form action="{{route('student_upload') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div id="camera"></div>
                <br/>
                <input type=button value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
            </div>
            <div class="col-md-6">
                <div id="results"></div>
            </div>
            <div class="col-md-12 text-center">
                <br/>
                <button id="but"  class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>

<script language="JavaScript">

    Webcam.set({
        width: 400,
        height: 320,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>
 
</body>
</html>