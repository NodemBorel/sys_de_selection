<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Vendor CSS Files -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.ico') }}" rel="icon"/>
    <link href="{{ asset('styles/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/css/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/css/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- datatable ----->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    <!-- Template Main CSS File -->
    <link href="{{ asset('styles/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/css/login.css') }}" rel="stylesheet">

    <title>Login</title>
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button{
            padding: 0px !important;
            margin: 0px !important;
        }
        div.dataTables_wrapper div.dataTables_length select{
            width: 50% !important;
        }

        #total-orders{
            background-color: #4cb4c7;
        }
        #orders-delivered{
            background-color: #7abecc;
        }
        #orders-pending{
            background-color: #7CD1C0;
        }

        .form-inline .form-group {
        display: inline-block;
        margin-right: 10px;
        }

        .form-inline label {
            display: inline-block;
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <script src="{{ asset('styles/js/jquery-3.7.0.min.js') }}"></script>

    @yield("content")

    
    <!-- Vendor JS Files -->
    <script src="{{ asset('styles/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('styles/js/aos.js') }}"></script>
    <script src="{{ asset('styles/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('styles/js/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('styles/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('styles/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('styles/js/validate.js') }}"></script>

    <!-- datatable ----->
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('styles/js/main.js') }}"></script>

    <script>
        $(document).ready(function(){
            $('#myDataTable').DataTable();
        });
    </script>
    
</body>
</html>