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
                                <h3 class="mb-1">Update User</h3>
                                <small class="text-muted">
                                    Fill up the required details below
                                </small>
                            </div>

                            <!-- Input Form -->
                            <form action="{{route('update-user')}}" method="post">
                           
                                
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
                                <div class="mb-3" title="Enter your email">
                                    <label for="txtEmail" class="form-label">Email <small class="text-danger">*</small></label>
                                    <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="eMailInput"
                                    placeholder="Email" value="{{ $user->email }}">
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
                                    <!-- First Name -->
                                    <div class="col-sm-12 col-md-6 mb-3" title="Enter your first name">
                                        <label for="txtFirstName" class="form-label">First Name <small class="text-danger">*</small></label>
                                        <input name="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" id="firstNameInput"
                                            placeholder="First Name" value="{{ $user->first_name }}">
                                        <small class="text-danger">
                                            @error('first_name') {{ $message }} @enderror
                                        </small>  
                                    </div>


                                    <!-- Nick Name -->
                                    <div class="col-sm-12 col-md-6 mb-3" title="Enter your nickname">
                                        <label for="txtNickName" class="form-label">Nick Name <small class="text-danger">*</small></label>
                                        <input name="nick_name" type="text" class="form-control @error('nick_name') is-invalid @enderror" id="nickNameInput"
                                            placeholder="Nick Name" value="{{ $user->nick_name }}">
                                        <small class="text-danger">
                                            @error('nick_name') {{ $message }} @enderror
                                        </small>    
                                    </div>
                                </div>

                                <div class="row">

                                    <!-- Middle Name -->
                                    <div class="col-sm-12 col-md-6 mb-3" title="Enter your middle name (optional)">
                                        <label for="txtMiddleName" class="form-label">Middle Name </label>
                                        <input name="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" id="middleNameInput"
                                        placeholder="Middle Name" value="{{ $user->middle_name }}">
                                    </div>


                                    <!-- Last Name -->
                                    <div class="col-sm-12 col-md-6 mb-3" title="Enter your last name">
                                        <label for="txtLastName" class="form-label">Last Name <small class="text-danger">*</small></label>
                                        <input name="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" id="lastNameInput"
                                            placeholder="Last name" value="{{ $user->last_name }}">
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


                                 <!-- Update Button -->
                                <div title="Click to update">
                                    <button class="btn btn-primary w-100 waves-effect waves-light" type="submit"
                                    data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="bottom" title="Update profile">
                                        Update
                                    </button>
                                </div>
                                <div class="mt-4 text-center text-muted" title="Cancel">
                                <p>
                                    <a href="/" class="fw-medium text-decoration-underline"
                                    data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="bottom" title="Cancel">
                                        Cancel
                                    </a>
                                </p>
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