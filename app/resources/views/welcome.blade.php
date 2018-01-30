<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistema de Control Académico</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link rel="shortcut icon" href="{{ asset('assets/img/logoEscuela.png') }}">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            html, body{
              height: 100%;
            }
            body { 
                background-image: url('assets/img/background/background.jpg') ;
                background-position: center center;
                background-repeat:  no-repeat;
                background-attachment: fixed;
                background-size:  cover;
                background-color: #999;
              
            }

            div, body{
              margin: 0;
              padding: 0;
              font-family: exo, sans-serif;
              
            }
            .wrapper {
              height: 100%; 
              width: 100%; 
            }

            .message {
              -webkit-box-sizing: border-box;
              -moz-box-sizing: border-box;
              box-sizing: border-box;
              width: 100%; 
              height:45%;
              bottom: 0; 
              display: block;
              position: absolute;
              background-color: rgba(0,0,0,0.6);
              color: #fff;
              padding: 0.5em;
            }



            .full-height {
                height: 100vh;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 50px;
            }

            .links > a {
                color: #fff;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }



        </style>
    </head>
    <body>

        <div class="wrapper">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Inicio</a>
                    @else
                        <a href="{{ url('/login') }}">Acceder</a>
                    @endif
                </div>
            @endif
            <div class="message">
                <h1>Sistema de Control Académico</h1>    
                <p>{{ config('app.name', 'Laravel') }}</p>
            </div>
        </div>
    </body>
</html>
