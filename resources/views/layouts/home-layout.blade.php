<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>REACH App</title>
        <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
        <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}" id="tabIcon">

        <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app.css') }}"  rel="stylesheet" type="text/css" />



    </head>

    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <body data-base-url="{{url('/')}}">


        <!-- Main Content -->
        @yield('content')


        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>
        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

    </body>
</html>
