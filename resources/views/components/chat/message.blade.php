<div id="users-chat" class="position-relative">
    <div class="p-3 p-lg-4 user-chat-topbar">
        <div class="d-flex align-items-center">
            
            <div class="flex-shrink-0 d-block d-lg-none me-3">
                {{-- <a href="javascript: void(0);" class="user-chat-remove font-size-18 p-1"> --}}
                
                <a href="{{ route('home') }}" class="user-chat-remove font-size-18 p-1">
                    <i class="bx bx-chevron-left align-middle"></i>
                </a>
            </div>
            
            <div id="room_id" style="display:none">{{ $room->id }}</div>
            <div id="user_id" style="display:none">{{ $user->id }}</div>
            <div class="flex-grow-1 overflow-hidden">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 chat-user-img online user-own-img align-self-center me-3 ms-0">
{{--                        <img src="{{ asset('assets/images/user-placeholder.png') }}" class="rounded-circle avatar-sm" alt="">--}}
{{--                        <img src="{{ $user->picture }}" class="rounded-circle avatar-sm" alt="">--}}
                        <img src="{{ asset('/assets/images/background/default-group-image.jpg') }}" class="rounded-circle avatar-sm" alt="">

{{--                        <span class="user-status"></span>--}}
                    </div>
                    <div class="flex-grow-1 overflow-hidden">
                        <h6 class="text-truncate mb-0 font-size-18"><a href="#" class="user-profile-show text-reset">{{ $room->name }}</a></h6>
{{--                        <p class="text-truncate text-muted mb-0"><small>Online</small></p>--}}
                    </div>
                </div>
            </div>
            <div class="">
                <a href="{{ route('home') }}" class="logo logo-dark mt-3">
                {{--            <img class="logo-sm" src="/assets/images/brand/reach-32.png">--}}
                    <img class="logo-sm" src="{{ asset('assets/images/brand/reach-32.png') }}">
                </a>
            </div>
        </div>
    </div>

    <div class="chat-conversation p-3 p-lg-4 " id="chat-conversation" data-simplebar onload="scrollToBottom">
        <ul class="list-unstyled chat-conversation-list" id="users-conversation">


          <!-- Sample Chat -->
            @foreach($messages as $msg)
                @if($msg->sent_by != $user->id)
            <li class="chat-list left" id="1">
                <div class="conversation-list">
{{--                  <div class="chat-avatar">--}}
{{--                    <img src="{{ asset('assets/images/user-placeholder.png') }}" alt="">--}}
{{--                  </div>--}}
                    <div class="user-chat-content">
                        <div class="ctext-wrap">
                            <div class="ctext-wrap-content">
                              <small class="text-indigo">{{ $msg->nick_name }}</small>
                              <i><small class="text-muted">{{ $msg->created_at }}</small></i>
                                @if($msg->message == "<<FILE>>")
                                    <p class="mb-0 ctext-content">
                                        <img src="{{ $msg->attachment }}" width="300" height="200">
                                    </p>
                                @else 
                                    <p class="mb-0 ctext-content">{{ $msg->message }}</p>
                                @endif
                            </div>
{{--                      <div class="dropdown align-self-start message-box-drop">--}}
{{--                        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                          <i class="ri-more-2-fill"></i>--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-menu">--}}
{{--                          <a class="dropdown-item d-flex align-items-center justify-content-between delete-item" href="#">Delete <i class="bx bx-trash text-muted ms-2"></i>--}}
{{--                          </a>--}}
{{--                        </div>--}}
{{--                      </div>--}}
{{--                    </div>--}}
{{--                    <div class="conversation-name">--}}
{{--                      <small class="text-muted time">10:07 am</small>--}}
{{--                      <span class="text-success check-message-icon">--}}
{{--                        <i class="bx bx-check-double"></i>--}}
{{--                      </span>--}}
                        </div>
                    </div>
                </div>
            </li>
                @else
                    <li class="chat-list right" id="1">
                        <div class="conversation-list">
                            <div class="user-chat-content">
                                <div class="ctext-wrap">
                                    <div class="ctext-wrap-content">
                                        <small>{{ $msg->nick_name }}</small>
                                        <i><small class="text-muted">{{ $msg->created_at }}</small></i>
                                        {{-- <p class="mb-0 ctext-content">{{ $msg->message }}</p> --}}
                                        @if($msg->message == "<<FILE>>")
                                            <p class="mb-0 ctext-content">
                                                <img src="{{ $msg->attachment }}" width="300" height="200">
                                            </p>
                                        @else 
                                            <p class="mb-0 ctext-content">{{ $msg->message }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endif

            @endforeach
        </ul>
    </div>

</div>
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
{{-- <script>
    // Enable pusher logging - don't include this in production
    // Pusher.logToConsole = true;

    // var pusher = new Pusher('anyKey', {
    //     cluster: 'mt1'
    // });
    var room_id = document.getElementById('room_id').innerHTML;
    var user_id = document.getElementById('user_id').innerHTML;
    var new_message = '';
    console.log('room_id: '+room_id);

    // var channel = pusher.subscribe('reachat.link');
    // channel.bind('message-sent', function(msg_) {
    window.Echo.channel('reachat.link')
        .listen('.message-sent', (e) => {
            if(room_id == e.room_id) {
                if(user_id != e.user_id) {
                    new_message = `
                    <li class="chat-list left" id="1">
                        <div class="conversation-list">
                        <div class="user-chat-content">
                            <div class="ctext-wrap">
                            <div class="ctext-wrap-content">
                                <small class="text-indigo">` + e.user_id +`</small>
                                <i><small class="text-muted">` + 'created_date_here' +`</small></i>
                                <p class="mb-0 ctext-content">` + e.message + `</p>
                            </div>
                            </div>
                        </div>
                        </div>
                    </li>`;

                } else {
                    new_message = `
                    <li class="chat-list right" id="1">
                        <div class="conversation-list">
                        <div class="user-chat-content">
                            <div class="ctext-wrap">
                            <div class="ctext-wrap-content">
                                <small>` + e.user_id +`</small>
                                <i><small class="text-muted">` + 'created_date_here' +`</small></i>
                                <p class="mb-0 ctext-content">` + e.message + `</p>
                            </div>
                            </div>
                        </div>
                        </div>
                    </li>`;
                }

                $("#users-conversation").append(new_message);
                $("#chat-conversation .simplebar-content-wrapper").scrollTop($("#chat-conversation .simplebar-content-wrapper").prop("scrollHeight"));

            }

    });


</script> --}}
<script>
    var counter = 200;
    var scrollToBottom = setTimeout(function(){
        $("#chat-conversation .simplebar-content-wrapper").scrollTop($("#chat-conversation .simplebar-content-wrapper").prop("scrollHeight"));
    },counter);

</script>

