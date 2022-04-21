<!-- Main Tab - User Profile -->
<div class="tab-pane" id="pills-user" role="tabpanel" aria-labelledby="pills-user-tab">
    <div>
        <div class="user-profile-img">
            <img src="{{ asset('assets/images/background/profile-background.jp') }}g" class="profile-img" style="height: 160px;" alt="">
            <div class="overlay-content">
                <div>
                    <div class="user-chat-nav p-2 ps-3">

                        <div class="d-flex w-100 align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="text-white mb-0">My Profile</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Profile Header -->
        <div class="text-center p-3 p-lg-4 border-bottom pt-2 pt-lg-2 mt-n5 position-relative">
            <div class="mb-lg-3 mb-2">
                <img src="{{ $user->picture }}" class="rounded-circle avatar-lg img-thumbnail" alt="">
            </div>

            <h5 class="font-size-20 mb-1 text-truncate">{{ $user->nick_name }}</h5>
            <p class="text-muted font-size-14 text-truncate mb-0">Member</p>
        </div>


        <!-- Profile Description -->
        <div class="p-4 profile-desc" data-simplebar>
            <div>
                <div class="d-flex py-2">
                    <div class="flex-shrink-0 me-3">
                        <i class="bx bx-user align-middle text-muted"></i>
                    </div>
                    <div class="flex-grow-1">
                        <p class="mb-0">{{ $user->first_name }} {{ $user->last_name }}</p>
                    </div>
                </div>

                <div class="d-flex py-2">
                    <div class="flex-shrink-0 me-3">
                        <i class="bx bx-message-rounded-dots align-middle text-muted"></i>
                    </div>
                    <div class="flex-grow-1">
                        <p class="mb-0">{{ $user->email }}</p>
                    </div>
                </div>

                <div class="d-flex py-2">
                    <div class="flex-shrink-0 me-3">
                        <i class="bx bx-calendar align-middle text-muted"></i>
                    </div>
                    <div class="flex-grow-1">
                        <p class="mb-0">Member since {{ date('M Y', strtotime($user->created_dtm)) }}</p>
                    </div>
                </div>
            </div>


            <!-- Edit User -->
            <div class="text-center mt-4">
                <a href="/update-user" class="text-primary pr-2">Edit Details</a>
            </div>

        </div>
    </div>
</div>
