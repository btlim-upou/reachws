const { default: axios } = require('axios');

require('./bootstrap');


const room_id = document.getElementById('room_id');
const user_id = document.getElementById('user_id');
const user_name = document.getElementById('user_name_h');
const message_input = document.getElementById('message_inputbox');
const message_form = document.getElementById('chatinput-form');
const chat_feedback = document.getElementById('chat-input-feedback');

const room_id_value = room_id.innerHTML;
const user_id_value = user_id.innerHTML;
const user_name_value = (user_name.innerHTML) ? user_name.innerHTML : user_name.value;
message_input.addEventListener('keyup',function(e) {
    if (message_input.value.length == 0) {
        const options = {
            method: 'post',
            url: '/typing-status',
            data: {
                room_id: room_id_value,
                user_id: user_id_value,
                user: user_name_value,
                typing: false
            }
        }
        axios(options);
        // return ;
    }
    else if (message_input.value.length == 1) {
        const options = {
            method: 'post',
            url: '/typing-status',
            data: {
                room_id: room_id_value,
                user_id: user_id_value,
                user: user_name_value,
                typing: true
            }
        }
        axios(options);
    }
});

window.Echo.channel('reachat.link')
    .subscribe('.', (e) => {
        console.log(e);
        if (room_id_value == e.room_id && user_id_value != e.user_id) {
            if (e.typing === true) {
                const status_message = "<i>" + e.user + " is typing...</i>";
                chat_feedback.innerHTML = status_message;
                chat_feedback.className = "chat-input-feedback show";
            } else {
                chat_feedback.className = "chat-input-feedback";
            }
        }
    });

window.Echo.channel('reachat.link')
    .listen('.typing-status', (e) => {
        console.log(e);
        if (room_id_value == e.room_id && user_id_value != e.user_id) {
            if (e.typing === true) {
                const status_message = "<i>" + e.user + " is typing...</i>";
                chat_feedback.innerHTML = status_message;
                chat_feedback.className = "chat-input-feedback show";
            } else {
                chat_feedback.className = "chat-input-feedback";
            }
        }
    });



message_form.addEventListener('submit',function(e) {
    e.preventDefault();
    if (message_input.value == '') {
        return ;
    }

    const options = {
        method: 'post',
        url: '/send-message',
        data: {
            message: message_input.value,
            user_id: user_id_value,
            room_id: room_id_value,
        }
    }

    axios(options);

});

window.Echo.channel('reachat.link')
    .listen('.message-sent', (e) => {
        console.log(e);

        if(room_id_value == e.room_id) {
            if(user_id_value != e.sender) {
                new_message = `
                <li class="chat-list left" id="1">
                    <div class="conversation-list">
                    <div class="user-chat-content">
                        <div class="ctext-wrap">
                        <div class="ctext-wrap-content">
                            <small class="text-indigo">` + e.user_info.nick_name +`</small>
                            <i><small class="text-muted">` + e.message_date +`</small></i>
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
                            <small>` + e.user_info.nick_name +`</small>
                            <i><small class="text-muted">` + e.message_date +`</small></i>
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
        if(room_id_value == e.room_id && user_id_value == e.sender) {
            message_input.value = '';
        }
        chat_feedback.className = "chat-input-feedback";
    });

window.Echo.channel('reachat.link')
.listen('.file-sent', (e) => {
    console.log(e);

    if(room_id_value == e.room_id) {
        if(user_id_value != e.sender) {
            new_message = `
            <li class="chat-list left" id="1">
                <div class="conversation-list">
                <div class="user-chat-content">
                    <div class="ctext-wrap">
                    <div class="ctext-wrap-content">
                        <small class="text-indigo">` + e.user_info.nick_name +`</small>
                        <i><small class="text-muted">` + e.message_date +`</small></i>
                        <p class="mb-0 ctext-content">
                            <img src="${e.file}" width="300" height="200" alt="${e.file}">
                        </p>
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
                        <small>` + e.user_info.nick_name +`</small>
                        <i><small class="text-muted">` + e.message_date +`</small></i>
                        <p class="mb-0 ctext-content">
                            <img src="${e.file}" width="300" height="200" alt="${e.file}">
                        </p>
                    </div>
                    </div>
                </div>
                </div>
            </li>`;
        }

        $("#users-conversation").append(new_message);
        $("#chat-conversation .simplebar-content-wrapper").scrollTop($("#chat-conversation .simplebar-content-wrapper").prop("scrollHeight"));

    }
    if(room_id_value == e.room_id && user_id_value == e.sender) {
        message_input.value = '';
    }
    chat_feedback.className = "chat-input-feedback";
});
