<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Vendor CSS Files -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.ico') }}" rel="icon" />
    <link href="{{ asset('styles/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/css/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/css/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('styles/css/main.css') }}" rel="stylesheet">

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
    @yield('content')


    <!-- Vendor JS Files -->
    <script src="{{ asset('styles/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('styles/js/aos.js') }}"></script>
    <script src="{{ asset('styles/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('styles/js/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('styles/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('styles/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('styles/js/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('styles/js/main.js') }}"></script>

</body>

</html>
