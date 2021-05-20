$(document).ready(function() {
    document.body.innerHTML = document.body.innerHTML + '<div id="chatrobo" class="animate__animated"><img src="assets/image/robot.png" alt="Chat Robo"></div><div id="chatrobo-opened" class="animate__animated"><div class="chatrobo"><div class="chatrobo-title" id="chatrobo-title"><h1 id="title-text">ChatRobo</h1><div class="chatrobo-closeBtn" id="chatroboClosebtn"><i class="fas fa-times"></i></div><div class="chatrobo-settingsBtn" id="chatrobo-settings-openBtn"><i class="fas fa-cog"></i></div><div id="chatrobo-settings" class="animate__animated"></div></div><div class="chatrobo-messages" id="chatrobo-messages"></div><div class="chatrobo-messageform "><div id="chatrobo-goback" class="animate__animated">Son Mesajlar <i class="fas fa-arrow-down"></i></div><form action="" id="chatroboForm" method="post"><textarea name="message" id="message" rows="2" placeholder="Merhaba ile başla..."></textarea><button type="submit" value="1"><i class="fas fa-paper-plane"></i></button></form></div></div></div>';
    var url = 'app/chatroboPhp/index.php';
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

    chatroboAdmincontrol();



    function chatroboAdmincontrol() {
        var adminchecker = new Array();
        adminchecker[0] = "adminchecker";
        adminchecker[1] = "";
        $.ajax({
            type: "POST",
            url: url,
            data: { adminchecker: adminchecker }, // serializes the form's elements.
            success: function(data) {
                if (data == "success") {
                    chatroboAdmin();
                }
            }
        });
    }

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
    $('#message').on('input', function() {
        var msg = document.getElementById("message");
        if ((msg.value)[0] == "/") {
            msg.classList.add('commandtext');
        } else {
            msg.classList.remove('commandtext');
        }
    })
    $('#chatroboForm').submit(function(e) {
        e.preventDefault();

        var form = $('#chatroboForm');

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

    $('#chatrobo-goback').click(function() {
        $('#chatrobo-messages').animate({ scrollTop: messages.scrollHeight }, 500);
    })
    $('#chatrobo-messages').scroll(function() {

        var st = $(this).scrollTop();

        var elem = $("#chatrobo-messages");
        var maxScrollTop = elem[0].scrollHeight - elem.outerHeight();

        if (st > lastScrollTop) {
            if ((st + 1) > maxScrollTop) {
                console.log((st + 1) + " -> " + maxScrollTop);
                document.getElementById('chatrobo-goback').classList.remove('animate__backInUp');
                document.getElementById('chatrobo-goback').classList.add('animate__backOutDown');
            }
        } else {
            if (maxScrollTop == 0) {
                return;
            }
            document.getElementById('chatrobo-goback').style.visibility = "visible";
            document.getElementById('chatrobo-goback').classList.add('animate__backInUp');
            document.getElementById('chatrobo-goback').classList.remove('animate__backOutDown');
        }
        lastScrollTop = st;
    })

    function chatroboAdmin() {
        title.style.backgroundColor = "red";
        text.innerHTML = "ChatRobo - admin";
        messages.innerHTML = "";
        sendingChecker = false;

    }

    function chatroboAdminOff() {
        title.style.backgroundColor = "#09b83e";
        text.innerHTML = "ChatRobo";
        messages.innerHTML = "";
        sendingChecker = false;

    }

    function chatCommands(deger) {
        sending.value = document.getElementById(deger).innerHTML;
    }



    function chatClear() {
        messages.innerHTML = "";
        sendingChecker = false;
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

    $('#chatrobo-settings-openBtn').click(function() {
        var langurl = "app/chatroboPhp/settings.php";
        var langpost = ["langpost"];
        document.getElementById('chatrobo-settings').style.display = "block";
        document.getElementById('chatrobo-settings').classList.remove('animate__bounceOutLeft');
        document.getElementById('chatrobo-settings').classList.add('animate__backInLeft');

        $.ajax({
            type: "POST",
            url: langurl,
            data: { langpost: langpost }, // serializes the form's elements.
            // serializes the form's elements.
            success: function(data) {
                document.getElementById('chatrobo-settings').innerHTML = data;
            }
        });


    });





});

function chatLang(gelen, gelen2) {
    var newlang = [gelen, gelen2];
    var newlangurl = "app/chatroboPhp/settings.php";
    if ($('#' + gelen).hasClass('current') == false) {
        $.ajax({
            type: "POST",
            url: newlangurl,
            data: { newlang: newlang }, // serializes the form's elements.
            // serializes the form's elements.
            success: function(data) {
                //console.log(data);
                //console.log();
                console.log(data);

                data = JSON.parse(data);
                if (data['process'] == "success") {
                    console.log(document.getElementById(data['old']));
                    console.log(data['new']);
                    document.getElementById(data['old']).classList.remove('current');
                    document.getElementById(data['new']).classList.add('current');
                    document.getElementById('chatrobo-settings-h1').innerHTML = data['newtitle'];
                } else {
                    console.log(data);
                }
            }
        });
    }


}

function chatroboSettingsClose() {
    document.getElementById('chatrobo-settings').classList.remove('animate__backInLeft');
    document.getElementById('chatrobo-settings').classList.add('animate__bounceOutLeft');
    setTimeout(function() {
        document.getElementById('chatrobo-settings').style.display = "none";

    }, 300);
}