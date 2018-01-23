<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>
	
	<link rel="shortcut icon" href="{{ asset('assets/img/logoEscuela.png') }}">


    <!-- Icons -->
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/simple-line-icons.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">


    <style type="text/css">
        
        em.error{
            color: #ff5454;
        }

    </style>

</head>
<body class="app flex-row align-items-center">
    <div class="container">
        @yield('content')
    </div>

    <!-- Bootstrap and necessary plugins -->
    <script src="{{ asset('assets/js/libs/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/libs/tether.min.js') }}"></script>
    <script src="{{ asset('assets/js/libs/bootstrap.min.js') }}"></script>

</body>
</html>
