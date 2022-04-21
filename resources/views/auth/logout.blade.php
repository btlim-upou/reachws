@extends('layouts.auth-layout')

@section('content')
<div class="row g-0">
    <div class="col-xl-3 offset-xl-2 col-lg-4">
        <div class="p-4 pb-0 p-lg-5 pb-lg-0 auth-logo-section">
            <div class="mt-auto">
                <img src="assets/images/auth-img.png" alt="" class="auth-img">
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-lg-8">
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
                                <h3>You are Logged Out</h3>
                                <p class="text-muted font-size-15">
                                    Thank you for using <span class="fw-semibold text-primary">REACH</span>
                                </p>

                                <div class="mt-5 text-center">
                                    <div class="signin-other-title">
                                        <h5 class="font-size-14 mb-4 title text-muted">Do you wish to go back?</h5>
                                    </div>
                                </div>
                                
                                <!-- Login Button -->
                                <div class="mt-4" title="Click to go to login page">
                                    <a href="/login" class="btn btn-primary w-100 waves-effect waves-light"
                                    data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="bottom" title="Click to login">
                                        Sign In
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
@endsection