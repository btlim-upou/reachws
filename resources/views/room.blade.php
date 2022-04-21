@extends('layouts.home-layout')


@section('content')
<div class="layout-wrapper d-lg-flex">

    <!-- Main Navigation Menu -->
    @include('components.navbar.main')

    <!-- Inner Navbar -->
    @include('components.navbar.inner')

    <!-- Main Chat -->
    <div class="user-chat w-100 overflow-hidden">
        <div class="user-chat-overlay"></div>
        <div class="chat-content d-lg-flex">
            <div class="w-100 overflow-hidden position-relative">

                <!-- User Chat Segment -->
                @include('components.chat.message')

                <!-- Chat Input Section -->
                @include('components.chat.input')
            </div>
        </div>
    </div>
</div>
@endsection


