@extends('layouts.home-layout')

@section('content')
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Profile') }}
        </h2>
    </x-slot>

    <h1>Edit Profile</h1>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('update-profile') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            
                        <div class="mb-3">
                            <label for="firstNameInput" class="form-label">First name:</label>
                            <input name="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" id="firstNameInput"
                                placeholder="First Name" value="{{ $user->first_name }}">
                            @error('first_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="middleNameInput" class="form-label">Middle name:</label>
                            <input name="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" id="middleNameInput"
                                placeholder="Middle Name" value="{{ $user->middle_name }}">
                            @error('middle_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="lastNameInput" class="form-label">Last name:</label>
                            <input name="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" id="lastNameInput"
                                placeholder="Last name" value="{{ $user->last_name }}">
                            @error('last_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nickNameInput" class="form-label">Nick Name:</label>
                            <input name="nick_name" type="text" class="form-control @error('nick_name') is-invalid @enderror" id="nickNameInput"
                                placeholder="Nick Name" value="{{ $user->nick_name }}">
                            @error('nick_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="eMailInput" class="form-label">Email:</label>
                            <input name="email" type="text" class="form-control @error('e_mail') is-invalid @enderror" id="eMailInput"
                                placeholder="Email" value="{{ $user->email }}">
                            @error('e_mail')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="flex justify-end mt-4">
                            <button  type="submit">update</button>
                    </form>
    
                </div>
            </div>
        </div>
    </div>


    
    @endsection