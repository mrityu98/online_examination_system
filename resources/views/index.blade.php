@extends('layouts.main')

@section('content')


<html>
    <body>
        <h2> Our Content</h2>
        <button type="button" onclick = "document.getElementById('demo').innerHTML = Date()">
            Click me to display Date and Time . 
        </button>
        <p id = "demo"></p>
    </body>
</html>
@endsection