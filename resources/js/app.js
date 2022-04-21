const { default: axios } = require('axios');

require('./bootstrap');


const room_id = document.getElementById('room_id');
const user_id = document.getElementById('user_id');
const message_input = document.getElementById('message_inputbox');
const message_form = document.getElementById('chatinput-form');

const room_id_value = room_id.innerHTML;
const user_id_value = user_id.innerHTML;

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
        message_input.value = '';
    });
