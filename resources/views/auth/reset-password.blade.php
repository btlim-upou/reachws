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
                            
                             <!-- Header -->
                            <div class="text-center mb-5">
                                <h3>Change Password</h3>
                            </div>
                            <div class="user-thumb text-center mb-4">
                                <img src="{{ $user->picture }}" class="rounded-circle img-thumbnail avatar-lg" alt="thumbnail">
                                <p class="font-size-15 my-3 text-muted">
                                    Hello <b class="text-capitalize">{{ $user->nick_name }}</b>. Let's change your password.
                                </p>
                            </div>


                            <!-- Input Form -->
                            <form action="{{ route('reset-password') }}" method="POST" class="pt-2">
                                <input name="token" type="hidden" value="{{ $user->token }}" >

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

                                 <!-- New Password -->
                                <div class="mb-3">
                                    <label for="txtPassword" class="form-label">New Password</label>
                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                        <input name="password" type="password" class="form-control pe-5" placeholder="Enter New Password" id="txtPassword"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" title="Enter your new password">
                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>      
                                </div>


                                 <!-- Confirm Password -->
                                <div class="mb-3">
                                    <label for="txtConfirmPassword" class="form-label">Confirm New Password</label>
                                    <input name="password_confirmation" type="password" class="form-control" id="txtConfirmPassword" placeholder="Enter Confirm Password"
                                    data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" title="Re-enter your password to make sure you can remember it">
                                    @error('password_confirmation')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="mt-4 text-center">
                                    <div class="signin-other-title">
                                        <h5 class="font-size-14 mb-3 title"></h5>
                                    </div>
                                </div>


                                <div class="text-center mt-4">
                                    <div class="row">

                                         <!-- Save Button -->
                                        <div class="col-6" title="Click to save changes">
                                            <button class="btn btn-primary w-100" type="submit"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="bottom" title="Click to save your changes">Save</button>
                                        </div>

                                         <!-- Back Button -->
                                        <div class="col-6" title="Click to go back">
                                            <button class="btn btn-light w-100" type="button"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="bottom" title="Go back to the previous page">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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