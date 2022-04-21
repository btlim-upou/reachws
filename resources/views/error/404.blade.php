<!doctype html>
<html lang="en">
    <head>     
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="_token" content="{{ csrf_token() }}">

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
                <div class="row g-0 justify-content-center my-auto">
                    <div class="col-sm-10 col-md-8 col-lg-7 col-xl-5">
                        <div class="authentication-page-content">
                            <div class="d-flex flex-column h-100 px-4 pt-4">
                                <div class="row justify-content-center my-auto">
                                    <div class="col-sm-8 col-lg-8 col-xl-9 col-xxl-8">     
                                        <div class="py-md-5 py-4">
                                            
                                            <!-- Avatar -->
                                            <div class="avatar-xl mx-auto">
                                                <div class="avatar-title bg-soft-primary text-primary h1 rounded-circle">
                                                    <i class="bx bxs-user"></i>
                                                </div>
                                            </div>
                
                                            <div class="my-4 pt-2 text-center">
                
                                                <!-- Header --> 
                                                <div class="mb-4">
                                                    <h3>Uh oh! 404 Not Found</h3>
                                                    <p class="text-muted font-size-15">
                                                        It seems your page is not available
                                                    </p>
                                                </div>
             
                                                <!-- Return Button -->
                                                <div class="mt-5" title="Click to go to login page">
                                                    <a href="/" class="btn btn-primary w-100 waves-effect waves-light"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="bottom" title="Click to return home">
                                                        Return Home
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                
                                <!-- Footer -->
                                @include('layouts.footer-layout')
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>    

    </body>
</html>
