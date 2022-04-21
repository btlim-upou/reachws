<!doctype html>
<html lang="en">
    <head>     
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
        <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}" id="tabIcon">

        <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app.css') }}"  rel="stylesheet" type="text/css" />

        <title>REACH App</title>
    
    </head>

    <body data-base-url="{{url('/')}}">
        <div class="auth-bg">
            <div class="container-fluid p-0">               
                @yield('content')
            </div>
        </div>

    
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>    
        <script src="{{ asset('assets/js/app.js') }}"></script>

    </body>
</html>
