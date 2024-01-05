<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="stylesheet" href="{{ asset('styles/css/bootstrap.min.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600;700&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- datatable ----->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    <title>App</title>
    <style>
        *{

            font-family: 'Poppins', sans-serif;
        }

        .blog-footer {
            padding: 0.5rem 0;
            color: #727272;
            text-align: center;
            background-color: #f9f9f9;
            border-top: .05rem solid #e5e5e5;
        }
        .blog-footer p:last-child {
            margin-bottom: 0;
        }
    
        .dataTables_wrapper .dataTables_paginate .paginate_button{
            padding: 0px !important;
            margin: 0px !important;
        }
        div.dataTables_wrapper div.dataTables_length select{
            width: 50% !important;
        }

        /*#logo{
        }*/

        /*body{
            background-color: #ebeff5;
        }*/
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

    <script src="{{ asset('styles/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    
    <!-- datatable ----->
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#myDataTable').DataTable({
                "pageLength": 5
            });
        });
        $(document).ready(function(){
            $('#myDataTable1').DataTable({
                "pageLength": 5 // Display 5 records per page
            });
        });
        $(document).ready(function(){
            $('#myDataTable2').DataTable();
        });
    </script>
    
</body>
</html>