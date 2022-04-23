<!-- Main Tab - User Profile -->
<div class="tab-pane" id="pills-rooms" role="tabpanel" aria-labelledby="pills-user-tab">
    <div>
        <div class="user-profile-img">
            <img src="{{ asset('assets/images/background/groups-background.jpg') }}" class="profile-img" style="height: 160px;" alt="">
            <div class="overlay-content">
                <div>
                    <div class="user-chat-nav p-2 ps-3">

                        <div class="d-flex w-100 align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="text-white mb-0">Chat Rooms</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Profile Header -->
        <div class="text-center p-3 p-lg-4 border-bottom pt-2 pt-lg-2 mt-n5 position-relative">
            <div class="mb-lg-3 mb-2">
                <img src="{{ asset('assets/images/room-placeholder.png') }}" class="rounded-circle avatar-lg img-thumbnail" alt="">
            </div>

{{--            <h5 class="font-size-20 mb-1 text-truncate">{{ $user->nick_name }}</h5>--}}
{{--            <p class="text-muted font-size-14 text-truncate mb-0">Member</p>--}}

        </div>
        <div class="px-4 pt-4">
            <div class="d-flex align-items-start">
                <div class="flex-grow-1">
                    <h4 class="mb-4">Rooms/Groups</h4>
                </div>
            </div>
            <form>
                <div class="input-group mb-3">
                    <input type="text" class="form-control bg-light border-0 pe-0" id="serachChatUser" onkeyup="searchUser()" placeholder="Search member or room"
                           aria-label="Example text with button addon" aria-describedby="searchbtn-addon" autocomplete="off">
                    <button class="btn btn-light" type="button" id="searchbtn-addon"><i class='bx bx-search align-middle'></i></button>
                </div>
            </form>
        </div>


        <!-- Chat Rooms -->
        <div class="p-4 profile-desc" data-simplebar>
            <div>
                    @foreach($all_rooms as $room)
                <div class="d-flex py-2">
                        <a href="/room/{{ $room->id }}">
                            <div class="d-flex align-items-center">
                                <div class="chat-user-img online align-self-center me-2 ms-0">
                                    <img src="{{ asset('assets/images/room-placeholder.png') }}" class="rounded-circle avatar-xs" alt="">
                                    <span class="user-status"></span>
                                </div>
                                <div class="overflow-hidden">
                                    <p class="text-truncate mb-0">{{ $room->name }}</p>
                                </div>
                            </div>
                        </a>
                </div>
                    @endforeach


            </div>


            <!-- Edit User -->
            <div class="text-center mt-4">
                {{-- <a href="javascript:" class="text-primary pr-2">Create Room</a> --}}
                <a href="/create-room" class="text-primary pr-2">Create Room</a>
            </div>

        </div>
    </div>
</div>
