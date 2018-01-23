<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Icons -->
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/simple-line-icons.css') }}" rel="stylesheet">

    <!-- Premium Icons -->
    <link href="{{ asset('assets/css/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/glyphicons-filetypes.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/glyphicons-social.css') }}" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('assets/img/logoEscuela.png') }}">

</head>
<body class="app header-fixed aside-menu-fixed aside-menu-hidden">

    @include('partials.admin.header')
    

    <div class="app-body">

        @include('partials.admin.sidebar')

        @yield('content')
    </div>


    <footer class="app-footer">
        <a href="{{ route('home') }}">{{ config('app.name', 'Laravel') }}</a> © {{ date('Y') }}
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Bootstrap and necessary plugins -->
    <script src="{{ asset('assets/js/libs/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/libs/tether.min.js') }}"></script>
    <script src="{{ asset('assets/js/libs/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/libs/pace.min.js') }}"></script>


    <!-- Plugins and scripts required by all views -->
    <script src="{{ asset('assets/js/libs/Chart.min.js') }}"></script>


    <!-- GenesisUI main scripts -->

    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- Plugins and scripts required by this views -->
    <script src="{{ asset('assets/js/libs/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/libs/gauge.min.js') }}"></script>
    <script src="{{ asset('assets/js/libs/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/libs/daterangepicker.js') }}"></script>

    <!-- Custom scripts required by this view -->
    <script src="{{ asset('assets/js/views/main.js') }}"></script>


    <script type="text/javascript">
        toastr.info('{{ config('app.name', 'Laravel') }}', 'Bienvenido {{ Auth::user()->name }}', {
            closeButton: true,
            progressBar: true,
        });
    </script>

</body>
</html>
