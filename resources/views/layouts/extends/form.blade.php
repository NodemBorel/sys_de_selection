<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="{{ asset('styles/css/bootstrap.min.css') }}">
    <link href="{{ asset('styles/css/main.css') }}" rel="stylesheet">

    <title>App</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        body{
            background-color: #f2f2f2;
        }
        
        .progress {
            height: 20px;
            margin-bottom: 20px;
        }

        .progress-bar {
            background-color:rgba(0, 130, 115);
        }

        .hov:hover{
            background-color: rgba(0, 130, 115);
            border: rgba(0, 130, 115);
        }
    </style>
</head>
<body>
    @yield("content")

    <script src="{{ asset('styles/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('styles/js/bootstrap.bundle.min.js') }}"></script>
    
</body>
</html>