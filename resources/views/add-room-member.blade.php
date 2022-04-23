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
                                <h3 class="mb-1">Add user to room</h3>
                                <small class="text-muted">
                                    Fill up the required details below
                                </small>
                            </div>

                            <!-- Input Form -->
                            <form action="{{route('add-room-member')}}" method="post">
                           
                                
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

                                <!-- Room Name -->
                                <div class="mb-3" title="Enter Room Name">
                                    <label for="addgroupname-input" class="form-label">Room Name <small class="text-danger">*</small></label>                               
                                    <select class="form-control" name="room_name" id="category">
                                        <option hidden>Choose Category</option>
                                        @foreach ($rooms as $items)
                                        <option value="{{ $items->id }}" {{ old('room_name') == $items->id ? 'selected' : ''}}>{{ $items->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="mb-3" title="add Member">
                                    <label for="addgroupname-input" class="form-label">Add Member <small class="text-danger">*</small></label>                               
                                    <select class="form-control" name="member_name" id="category">
                                        <option hidden>Choose Category</option>
                                        @foreach ($user as $item)                                      
                                        <option value="{{ $item->id }}" {{ old('member_name') == $item->id ? 'selected' : ''}}>{{ $item->first_name }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                 <!-- Register Button -->
                                <div title="Click to create new account">
                                    <button class="btn btn-primary w-100 waves-effect waves-light" type="submit"
                                    data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="bottom" title="Click to Create Room">
                                    Add to Room
                                    </button>
                                </div>

                            </form>
                            
                            <div class="mt-4 text-center text-muted" title="Home">
                                <p>
                                    <a href="/" class="fw-medium text-decoration-underline"
                                    data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="bottom" title="Home">
                                        Home
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