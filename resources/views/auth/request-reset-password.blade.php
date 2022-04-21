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
                    <div class="col-sm-8 col-lg-6 col-xl-5 col-xxl-6">
                        <div class="py-md-6 py-4">
                            
                            <!-- Header -->
                            <div class="text-center mb-5">
                                <h3>Reset Password</h3>
                                <p class="text-muted">Enter your email to proceed password reset process</p>
                            </div>
                            
                            <!--Input Form -->
                            <form action="{{ route('send-reset-token') }}" method="POST">


                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @elseif (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif


                                @csrf
                            

                                <!-- Email -->
                                <div class="mb-4">
                                    <label class="form-label">Email</label>
                                    <input name="email" type="text" class="form-control" id="email" placeholder="Enter email"
                                    data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" title="Enter your registered email">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                
                                <!-- Reset Button -->
                                <div class="text-center mt-4">
                                    <button class="btn btn-primary w-100" type="submit"
                                    data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" title="Click to send reset password request">
                                        Reset Password
                                    </button>
                                </div>
                            </form>

                            <!-- Go to Login -->
                            <div class="mt-5 text-center text-muted">
                                <p>Remember It ? 
                                    <a href="/login" class="fw-medium text-decoration-underline"
                                    data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="bottom" title="Click to go back to login page"> 
                                        Login
                                    </a>
                                </p>
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