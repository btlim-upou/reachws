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
                    <div class="col-sm-8 col-lg-8 col-xl-9">     
                        <div class="py-md-5 py-4">
                            
                             <!-- Header -->
                            <div class="text-center mb-4">
                                <h3 class="mb-1">Register Account</h3>
                                <small class="text-muted">
                                    Fill up the required details below
                                </small>
                            </div>

                            <!-- Input Form -->
                            <form action="{{route('register-user')}}" method="post">
                           
                                
                                @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                @if(Session::has('failed'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('failed') }}
                                    </div>
                                @endif

                                @csrf

                                <!-- Email -->
                                <div class="mb-3" title="Enter your email">
                                    <label for="txtEmail" class="form-label">Email <small class="text-danger">*</small></label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="txtEmail" placeholder="Enter your email" title="Enter your email">  
                                    <small class="text-danger">
                                        @error('email') {{ $message }} @enderror
                                    </small>      
                                </div>
                                

                                <div class="mt-3 text-center">
                                    <div class="signin-other-title">
                                        <h5 class="font-size-14 mb-3 title"></h5>
                                    </div>
                                </div>


                                <div class="row">


                                    <!-- Password -->
                                    <div class="col-sm-12 col-md-6 mb-3" title="Enter your first name">
                                        <label for="txtPassword" class="form-label">Password <small class="text-danger">*</small></label>
                                        <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="txtPassword" placeholder="Enter your password" title="Enter your password">
                                        <small class="text-danger">
                                            @error('password') {{ $message }} @enderror
                                        </small>  
                                    </div>


                                    <!-- Confirm Password -->
                                    <div class="col-sm-12 col-md-6 mb-3" title="Enter your first name">
                                        <label for="txtPassword" class="form-label">Confirm Password <small class="text-danger">*</small></label>
                                        <input type="password" name="password_confirmation" class="form-control" id="txtPassword" placeholder="Enter your password" title="Enter your password">
                                        <small class="text-danger">
                                            @error('password_confirmation') {{ $message }} @enderror
                                        </small>  
                                    </div>


                                    <div class="col-sm-12">
                                        <div class=" mt-3 text-center">
                                            <div class="signin-other-title">
                                                <h5 class="font-size-14 mb-3 title"></h5>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- First Name -->
                                    <div class="col-sm-12 col-md-6 mb-3" title="Enter your first name">
                                        <label for="txtFirstName" class="form-label">First Name <small class="text-danger">*</small></label>
                                        <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" id="txtFirstName" placeholder="Enter your first name" title="Enter your first name">  
                                        <small class="text-danger">
                                            @error('first_name') {{ $message }} @enderror
                                        </small>  
                                    </div>


                                    <!-- Nick Name -->
                                    <div class="col-sm-12 col-md-6 mb-3" title="Enter your nickname">
                                        <label for="txtNickName" class="form-label">Nick Name <small class="text-danger">*</small></label>
                                        <input type="text" name="nick_name" value="{{ old('nick_name') }}" class="form-control" id="txtNickName" placeholder="Enter your nickname" title="Enter your nickname">  
                                        <small class="text-danger">
                                            @error('nick_name') {{ $message }} @enderror
                                        </small>    
                                    </div>
                                </div>

                                <div class="row">

                                    <!-- Middle Name -->
                                    <div class="col-sm-12 col-md-6 mb-3" title="Enter your middle name (optional)">
                                        <label for="txtMiddleName" class="form-label">Middle Name </label>
                                        <input type="text" name="middle_name" value="{{ old('middle_name') }}" class="form-control" id="txtMiddleName" placeholder="Enter your middle name" title="Enter your middle name">                                     
                                    </div>


                                    <!-- Last Name -->
                                    <div class="col-sm-12 col-md-6 mb-3" title="Enter your last name">
                                        <label for="txtLastName" class="form-label">Last Name <small class="text-danger">*</small></label>
                                        <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" id="txtLastName" placeholder="Enter your last name" title="Enter your last name">  
                                        <small class="text-danger">
                                            @error('last_name') {{ $message }} @enderror
                                        </small>  
                                    </div>
                                </div>
                    
                                
                                <div class="text-center my-3">
                                    <div class="signin-other-title">
                                        <h5 class="font-size-14 mb-3 title"></h5>
                                    </div>
                                </div>


                                 <!-- Register Button -->
                                <div title="Click to create new account">
                                    <button class="btn btn-primary w-100 waves-effect waves-light" type="submit"
                                    data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="bottom" title="Click to register your new account">
                                        Register
                                    </button>
                                </div>

                            </form>

                             <!-- Return to Login -->
                            <div class="mt-4 text-center text-muted" title="Click to go back to login page">
                                <p>Already have an account ? 
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