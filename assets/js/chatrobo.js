$(function () {
    var chatrobo = 'chatrobo';
    var chatroboscreen = 'chatrobo-opened';
    var chatroboClosebtn = 'chatroboClosebtn';
    document.getElementById(chatroboscreen).style.display = "block";

    $('#'+chatrobo).on('click', function () {
        document.getElementById(chatrobo).style.display = "none";
        document.getElementById(chatroboscreen).style.visibility = "visible";
        document.getElementById(chatroboscreen).style.marginLeft ="0vw";
    });
    $('#' + chatroboClosebtn).on('click', function () {
        document.getElementById(chatrobo).style.display = "block";
        document.getElementById(chatroboscreen).style.visibility = "hidden";
        document.getElementById(chatroboscreen).style.marginLeft = "-100vw";
    });
    $('#chatroboForm').submit(function (e) {
        e.preventDefault(); 

        var form = $('#chatroboForm');
        var url = 'app/chatroboPhp/test.php';

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function (data) {
                alert(data); // show response from the php script.
            }
        });
    });
    
});