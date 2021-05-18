$(function() {
    var chatrobo = 'chatrobo';
    var chatroboscreen = 'chatrobo-opened';
    var chatroboClosebtn = 'chatroboClosebtn';
    var title = document.getElementById('chatrobo-title');
    var text = document.getElementById('title-text');
    var messages = document.getElementById('chatrobo-messages');
    var sending = document.getElementById('message');

    var messageHead = '<div class="chatrobo-baloon send animate__animated animate__slideInLeft"><div class="sender-title"><a target="_blank" href="https://github.com/mucahitsendinc/chatrobo" >ChatRobo</a></div><p>';
    var messageFoot = '</p></div>';
    var smessageHead = '<div class="chatrobo-baloon sender animate__animated animate__slideInRight""><p>';
    var smessageFoot = '</p></div>';

    var sendingChecker = false;
    var lastScrollTop = 0;

    document.getElementById(chatroboscreen).style.display = "block";

    function chatScroll() {
        messages.scrollTo(0, messages.scrollHeight);
    }
    $('#' + chatrobo).on('click', function() {
        document.getElementById(chatrobo).classList.add('animate__zoomOutLeft');
        document.getElementById(chatrobo).classList.remove('animate__zoomInUp');
        document.getElementById(chatroboscreen).style.visibility = "visible";
        document.getElementById(chatroboscreen).classList.add('animate__zoomInUp');
        document.getElementById(chatroboscreen).classList.remove('animate__zoomOutLeft');
    });
    $('#' + chatroboClosebtn).on('click', function() {
        document.getElementById(chatrobo).classList.remove('animate__zoomOutLeft');
        document.getElementById(chatrobo).classList.add('animate__zoomInUp');
        document.getElementById(chatroboscreen).style.visibility = "hidden";
        document.getElementById(chatroboscreen).classList.remove('animate__zoomInUp');
        document.getElementById(chatroboscreen).classList.add('animate__zoomOutLeft');

    });
    $("#message").keypress(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (e.shiftKey != true && sendingChecker == false) {
            if (code == 13) {
                e.preventDefault();
                $("#chatroboForm").submit();
            }
        }

    });
    $('#chatroboForm').submit(function(e) {
        e.preventDefault();

        var form = $('#chatroboForm');
        var url = 'app/chatroboPhp/index.php';

        if (message.value.length > 0 && sendingChecker == false) {
            console.log(sendingChecker);
            messages.innerHTML = messages.innerHTML.replace("animate__animated animate__slideInLeft", "");
            messages.innerHTML = messages.innerHTML.replace("animate__animated animate__slideInRight", "");
            messages.innerHTML = messages.innerHTML + smessageHead + message.value + smessageFoot;
            var loadingimg = '<div><img class="loading" src="assets/image/chatrobowriting.gif"></div>';
            setTimeout(function() {
                var loadingmessages = messages.innerHTML;
            }, 500);
            messages.innerHTML = messages.innerHTML.replace('<div><img class="loading" src="assets/image/chatrobowriting.gif"></div>', '');
            messages.innerHTML = messages.innerHTML + loadingimg;
            chatScroll();
            var newmessage = new Array();
            newmessage[0] = "message";
            newmessage[1] = message.value;
            message.value = "";
            sendingChecker = true;

            $.ajax({
                type: "POST",
                url: url,
                data: { newmessage: newmessage }, // serializes the form's elements.
                success: function(data) {
                    switch (data) {
                        case "success":
                            chatroboAdmin();
                            break;
                        case "clear":
                            chatClear();
                            break;
                        case "quit":
                            chatroboAdminOff();
                            break;
                        default:
                            addMessage(data);
                            break;
                    }
                }
            });
            message.value = "";
            

        }
    });
    $('#chatrobo-goback').click(function(){
        $('#chatrobo-messages').animate({ scrollTop: messages.scrollHeight }, 500);
    })
    $('#chatrobo-messages').scroll(function(){

        var st = $(this).scrollTop();

        var elem = $("#chatrobo-messages");
        var maxScrollTop = elem[0].scrollHeight - elem.outerHeight();

        if (st > lastScrollTop) {
            if ((st+1) > maxScrollTop) {
                
                document.getElementById('chatrobo-goback').classList.remove('animate__backInUp');
                document.getElementById('chatrobo-goback').classList.add('animate__backOutDown');
           }
        } else {
            document.getElementById('chatrobo-goback').style.visibility = "visible";
            document.getElementById('chatrobo-goback').classList.add('animate__backInUp');
            document.getElementById('chatrobo-goback').classList.remove('animate__backOutDown');
        }
        console.log(st + " -> " + maxScrollTop);
        lastScrollTop = st;
    })
    function chatroboAdmin() {
        title.style.backgroundColor = "red";
        text.innerHTML = "ChatRobo - admin";
        messages.innerHTML = "";
    }

    function chatroboAdminOff() {
        title.style.backgroundColor = "#09b83e";
        text.innerHTML = "ChatRobo";
        messages.innerHTML = "";

    }

    function chatCommands(deger) {
        sending.value = document.getElementById(deger).innerHTML;
    }

    function chatClear() {
        messages.innerHTML = "";
        sendingChecker=false;
        document.getElementById('chatrobo-goback').classList.remove('animate__backInUp');


    }

    function addMessage(data) {
        messages.innerHTML = messages.innerHTML.replace("animate__animated animate__slideInLeft", "");
        messages.innerHTML = messages.innerHTML.replace("animate__animated animate__slideInRight", "");
        messages.innerHTML = messages.innerHTML.replace('<div><img class="loading" src="assets/image/chatrobowriting.gif"></div>', '');
        messages.innerHTML = messages.innerHTML + messageHead + data + messageFoot;
        document.getElementById('chatrobo-goback').classList.remove('animate__backInUp');

        chatScroll();
        sendingChecker = false;
    }
});