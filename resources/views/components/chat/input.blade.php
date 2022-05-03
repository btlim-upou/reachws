<div class="position-relative">
    <div class="chat-input-section p-3 p-lg-4">

        {{-- <form id="chatinput-form" enctype="multipart/form-data" action="{{ route('send-message') }}" method="post" > --}}
        <form id="chatinput-form" enctype="multipart/form-data">
            @csrf
            <div class="row g-0 align-items-center">
             <div class="file_Upload"></div>
                <div class="col-auto">
                    <div class="chat-input-links me-md-2">
                        <input id="attachedfile-input" type="file" class="d-none" accept=".zip,.rar,.7zip,.pdf">
                        <div class="links-list-item" >
                            <button type="button" class="btn btn-link text-decoration-none btn-lg waves-effect" data-bs-toggle="collapse" data-bs-target="#chatinputmorecollapse" aria-expanded="false" aria-controls="chatinputmorecollapse">
                                <i class="bx bx-paperclip align-middle"></i>
                            </button>

                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="position-relative">
                        <div class="chat-input-feedback" id="chat-input-feedback">
                            Please Enter a Message
                        </div>
                        <input name="message_inputbox" id="message_inputbox" autocomplete="off" type="text" class="form-control form-control-lg chat-input" autofocus placeholder="Type your message...">
                        <input type="hidden" name="room_id" id="room_id" value="{{ $room->id }}">
                        <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="user_name_h" id="user_name_h" value="{{ $user->nick_name }}">
                    </div>
                </div>
                <div class="col-auto">
                    <div class="chat-input-links ms-2 gap-md-1">
                        <div class="links-list-item">
                            <button type="submit" id="submit-btn" class="btn btn-primary btn-lg chat-send waves-effect waves-light"  data-bs-toggle="collapse" data-bs-target=".chat-input-collapse1.show">
                                <i class="bx bxs-send align-middle"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
