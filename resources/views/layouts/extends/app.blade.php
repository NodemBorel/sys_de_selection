<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="{{ asset('styles/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/css/main.css') }}">
    
    <!-- <script src="{{ asset('styles/js/jquery.min.js') }}"></script> -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600;700&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>App</title>
    <style>
        .blocked {
            pointer-events: none;
            cursor: default;
            text-decoration: line-through;
            color: #ccc;
        }
    </style>
</head>
<body>
    @yield("content")

    
    <script src="{{ asset('styles/js/bootstrap.bundle.min.js') }}"></script>
    
</body>
</html>