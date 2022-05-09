<div class="position-relative">
    <div class="chat-input-section p-3 p-lg-4">
        
        {{-- <form id="chatinput-form" enctype="multipart/form-data" action="{{ route('send-message') }}" method="post" > --}}
        <form id="chatinput-form" enctype="multipart/form-data">
            @csrf
            <div class="row g-0 align-items-center">
                
                <div class="col-auto">
                    <div class="chat-input-links me-md-2">
                        
                        <div class="links-list-item" >
                            <button id="btn_attach" type="button" class="btn btn-link text-decoration-none btn-lg waves-effect" data-bs-toggle="collapse" data-bs-target="#chatinputmorecollapse" aria-expanded="false" aria-controls="chatinputmorecollapse">
                                <i class="bx bx-paperclip align-middle"></i>
                            </button>
                        </div>
                        {{-- <input id="attachedfile-input" type="file" class="d-none" accept=".zip,.rar,.7zip,.pdf"> --}}
                    </div>
                </div>
                <div id="display_image" class="d-none"></div>
                <div id="div_attach" class="div_attach d-none">
                    <input type="file" id="inp_file_attach" accept="image/*">
                    <button id="btn_del_attach" type="button" class="btn btn-danger btn-sm">
                        <i class="bx bx-trash align-middle"></i>
                    </button>
                    
                    <button id="upload-file" name="upload-file" class="btn btn-primary btn-sm" onclick="saveFile()"> 
                        <i class="bx bxs-send align-middle"></i>
                    </button>
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
<script>
    const div_attach = document.getElementById('div_attach');
    const inp_attach = document.getElementById('inp_file_attach');
    const btn_attach = document.getElementById('btn_attach');
    const btn_del_attach = document.getElementById('btn_del_attach');
    const div_display_image = document.getElementById('display_image');
    const msg_inp_box = document.getElementById('message_inputbox');
    const btn_submit = document.getElementById('submit-btn');
    const btn_send_file = document.getElementById('upload-file');

    const room_id = document.getElementById('room_id');
    const user_id = document.getElementById('user_id');
    const user_name = document.getElementById('user_name_h');
    const message_input = document.getElementById('message_inputbox');
    const message_form = document.getElementById('chatinput-form');
    const chat_feedback = document.getElementById('chat-input-feedback');

    const room_id_value = room_id.innerHTML;
    const user_id_value = user_id.innerHTML;
    const user_name_value = (user_name.innerHTML) ? user_name.innerHTML : user_name.value;

    btn_attach.addEventListener('click', function(){
        if(div_attach.className == "div_attach d-none"){
            div_attach.className = "div_attach col-auto";
            inp_attach.className = "";
            msg_inp_box.style.display = "none";
            btn_submit.style.display = "none";
            // btn_del_attach.display = "none";
            // btn_send_file.display = "none";
        } else {
            // inp_attach.value = "";
            // div_attach.className = "div_attach d-none";
            // div_display_image.className = "d-none";
            hide_attachment_controls();
            

        }
    });

    btn_del_attach.addEventListener('click', function(){
        // inp_attach.value = null;
        // div_attach.className = "div_attach d-none";
        // div_display_image.className = "d-none";
        hide_attachment_controls();
    });

    var uploaded_image = "";
    inp_attach.addEventListener("change", function(){
        const reader = new FileReader();
        reader.addEventListener("load", () => {
            uploaded_image = reader.result;
            // console.log(uploaded_image);
            document.querySelector("#display_image").style.backgroundImage = `url(${uploaded_image})`;
            div_display_image.className = "";
            inp_attach.className = "d-none";
            btn_del_attach.display = "block";
            btn_send_file.display = "block";

            
            // file_source = `url(${uploaded_image})`;
            // document.querySelector("#display_image").innerHTML = `<img src="` + `url(${uploaded_image})` + `" >`;
        });
        reader.readAsDataURL(this.files[0]);
        // console.log(this.files[0]);

        // const options = {
        //     method: 'post',
        //     url: '/assets/php/upload.php',
        //     data: {
        //         path: `url(${uploaded_image})`,
        //         attachment: uploaded_image
        //     }
        // };
        // axios(options);
    });

    function hide_attachment_controls() {
        inp_attach.value = null;
        div_attach.className = "div_attach d-none";
        div_display_image.className = "d-none";
        msg_inp_box.style.display = "block";
        btn_submit.style.display = "block";
    }

    function show_attachment_controls() {
        div_attach.className = "div_attach";
        div_display_image.className = "";
    }

    async function saveFile(){
        if (inp_attach.files[0]) {

            let formData = new FormData();
            let file =  inp_attach.files[0];
            var date = new Date();
            console.log(file.name);
            var datestring = date.getFullYear()+
            "_"+(date.getMonth()+1)+
            "_"+date.getDate()+
            "-"+date.getHours()+
            "_"+date.getMinutes()+
            "_"+date.getSeconds();
            let newFilename = datestring + "-" + file.name;
            
            // formData.append("file", inp_attach.files[0]);
            formData.append("file",file, newFilename);

            // console.log(file);
            // console.log(newFilename);
            await fetch('/assets/php/upload.php', {method: "POST", body: formData})
            // .then(response => response.json())
            .then(data => console.log(data));

            hide_attachment_controls();

            const options = {
            method: 'post',
            url: '/send-file',
            data: {
                user_id: user_id_value,
                room_id: room_id_value,
                message: '<<FILE>>',
                file: '/storage/attachments/' + newFilename,
                }
            }

            axios(options);
        }
    }

    
</script>
<style>
    .div_attach.col-auto {
        display: block;
    }

    #display_image{
        width: 150px;
        height: 90px;
        border: 1px solid black;
        background-position: center;
        background-size: cover;
        margin-right: 2em;
    }

</style>
