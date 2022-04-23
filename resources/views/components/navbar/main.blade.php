<div class="side-menu flex-lg-column">

    <!-- App Logo -->
    <div class="navbar-brand-box">
        {{-- <a href="javascript:" class="logo logo-dark mt-3"> --}}
        <a href="{{ route('home') }}" class="logo logo-dark mt-3">
{{--            <img class="logo-sm" src="/assets/images/brand/reach-32.png">--}}
            <img class="logo-sm" src="{{ asset('assets/images/brand/reach-32.png') }}">
        </a>
    </div>

    <div class="flex-lg-column my-0 sidemenu-navigation">
        <ul class="nav nav-pills side-menu-nav" role="tablist">


            <!-- Chats -->
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" data-bs-container=".sidemenu-navigation" title="Chats">
                <a class="nav-link active" id="pills-chat-tab" data-bs-toggle="pill" href="#pills-chat" role="tab">
                    <i class='bx bx-conversation'></i>
                </a>
            </li>

            <!-- Rooms -->
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" data-bs-container=".sidemenu-navigation" title="Rooms">
                <a class="nav-link" id="pills-rooms-tab" data-bs-toggle="pill" href="#pills-rooms" role="tab">
                    <i class='bx bx-group'></i>
                </a>
            </li>


            <!-- Profile -->
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" data-bs-container=".sidemenu-navigation" title="Profile">
                <a class="nav-link" id="pills-user-tab" data-bs-toggle="pill" href="#pills-user" role="tab">
                    <i class='bx bx-user-circle'></i>
                </a>
            </li>

            <!-- Change Password --> <!-- TODO: ADD FUNCTIONALITY -->
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" data-bs-container=".sidemenu-navigation" title="Change Password">
                <a class="nav-link" id="pills-chat-tab" href="/update-password" role="tab">
                    <i class='bx bx-lock'></i>
                </a>
            </li>

            <!-- Logout --> <!-- TODO: ADD CONFIRMATION -->
            <li class="nav-item mt-auto" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" data-bs-container=".sidemenu-navigation" title="Logout">
                <a class="nav-link" id="pills-chat-tab" href="/logout" role="tab">
                    <i class='bx bx-log-out'></i>
                </a>
            </li>

        </ul>
    </div>
</div>
