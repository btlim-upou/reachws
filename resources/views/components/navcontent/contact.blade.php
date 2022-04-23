<div class="tab-pane show active" id="pills-chat" role="tabpanel" aria-labelledby="pills-chat-tab">
    <div>

        <div class="user-profile-img">
            <img src="{{ asset('assets/images/background/user-background.jpg') }}" class="profile-img" style="height: 160px;" alt="">
            <div class="overlay-content">
                <div>
                    <div class="user-chat-nav p-2 ps-3">

                        <div class="d-flex w-100 align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="text-white mb-0">{{ $user->nick_name }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center p-3 p-lg-4 border-bottom pt-2 pt-lg-2 mt-n5 position-relative">
            <div class="mb-lg-3 mb-2">
                <img src="{{ asset('assets/images/user-placeholder.png') }}" class="rounded-circle avatar-lg img-thumbnail" alt="">
            </div>

            {{--            <h5 class="font-size-20 mb-1 text-truncate">{{ $user->nick_name }}</h5>--}}
            {{--            <p class="text-muted font-size-14 text-truncate mb-0">Member</p>--}}

        </div>
        <div class="px-4 pt-4">

            <form>
                <div class="input-group mb-3">
                    <input type="text" class="form-control bg-light border-0 pe-0" id="serachChatUser" onkeyup="searchUser()" placeholder="Search member or room"
                    aria-label="Example text with button addon" aria-describedby="searchbtn-addon" autocomplete="off">
                    <button class="btn btn-light" type="button" id="searchbtn-addon"><i class='bx bx-search align-middle'></i></button>
                </div>
            </form>
        </div>

        <div class="chat-room-list" data-simplebar>

             <!-- Member Section -->
            <div class="d-flex align-items-center px-4 mt-3 mb-2">
                <div class="flex-grow-1">
                    <h4 class="mb-0 font-size-11 text-muted text-uppercase">
                        Rooms
                    </h4>
                </div>
            </div>
            <div class="chat-message-list">
                <ul class="list-unstyled chat-list chat-user-list" id="usersList">

                    <li id="contact-id-1" data-name="direct-message">
                        @foreach($rooms as $room)
                        <a href="/room/{{ $room->room_id }}">
                          <div class="d-flex align-items-center">
                            <div class="chat-user-img online align-self-center me-2 ms-0">
                              <img src="{{ asset('assets/images/user-placeholder.png') }}" class="rounded-circle avatar-xs" alt="">
                              <span class="user-status"></span>
                            </div>
                            <div class="overflow-hidden">
                              <p class="text-truncate mb-0">{{ $room->room_name }}</p>
                            </div>
                          </div>
                        </a>
                        @endforeach
                    </li>

                </ul>
            </div>

            <div class="text-center mt-4">
                <a href="/create-room" class="text-primary pr-2">Create Rooms</a>
            </div>
        </div>
    </div>

    <!-- Create Room Modal -->
    @include('components.modal.create-room')

</div>
