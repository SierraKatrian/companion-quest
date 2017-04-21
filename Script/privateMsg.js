
$(document).ready(function() {


    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });


    function loadChats() {

        $.getJSON('./Models/getchats.php', function (data) {


            var chat = "";
            $.each(data, function (index, obj) {


                chat += '<li class="msgList"><img class="img-chat" src="' + obj.picture +'" alt="user picture" />'
                    + '<input class="user_btn" id="select_user" type="button" name="selectUser" value="' + obj.user_name +'"/>' +
                    '</li>';


            });


            $('#chatList').html(chat);
        });


    }//end load chats

    loadChats();
    setInterval(loadChats, 1000);


    //onclick, grab the value of the button and store it in a variable.
    //send an ajax post request with the value of button to php page
    var selected_user = "";
    $('#chats').on('click', '.user_btn', function () {

        selected_user = $(this).val();


        $.post('./Models/getMessages.php', {UserName: selected_user}, function (res) {
           // console.log(res);

            var msg = "";
            $.each(res, function (index, obj) {
                msg += '<li class="msgText"><p class="username">'+ obj.user_name +'</p><p class="time">' + obj.time_sent + '</p><p class="reply">'
                    + obj.reply  + '</p></li>';

            });

            $('#createChat').hide("fast");
            $('#sendNewMsg').hide("fast");
            $('#sendMsg').show("fast");
            $('#msgs').html(msg);
            $('#msgBox').show("slow");
            $('#messages').scrollTop($('#messages')[0].scrollHeight);
        });
    });//end load messages

    //create ajax for sending a new message
    //$user_one, $user_two, $reply, $textTime
    $('#sendMsg').on('click', function () {


        var text = $('#msgText').val(); //input form
        //var time_sent = new Date;


        $.post('./Models/sendMsg.php', {user_two : selected_user, reply: text},
            function (data) {

                $.post('./Models/getMessages.php', {UserName: selected_user}, function (res) {
                    console.log(res);

                    var msg = "";
                    $.each(res, function (index, obj) {
                        msg +=  '<li class="msgText"><p class="username">'+ obj.user_name +'</p><p class="time">' + obj.time_sent + '</p><p class="reply">'
                            + obj.reply  + '</p></li>';

                    });

                    $('#createChat').hide("fast");
                    $('#sendNewMsg').hide("fast");
                    $('#msgText').val("");
                    $('#msgs').html(msg);
                    $('#messages').scrollTop($('#messages')[0].scrollHeight);
                });
            });


    });//end send msg

    $('#boxclose').click(function(){
        $('#msgBox').hide("slow");

    });

    $("#chatList").on("mouseenter", "input", function() {
        $(this).css("background-color","#6c6c93");

    });

    $("#chatList").on("mouseleave", "input", function() {
        $(this).css("background-color","#1d1d27");

    });

    $("#newChat").click(function (){
        $('#msgBox').show("slow");
        $('#createChat').show("fast");
        $('#sendNewMsg').show("fast");
        $('#sendMsg').hide("fast");
        $('#msgs').html("");


    });

    $('#sendNewMsg').click(function (){
       // alert('hello!');
        var text = $('#msgText').val(); //input form
        var selected_user = $('#to').val(); //grab user from select dropdown

        $.post('./Models/createNewMsg.php', {to : selected_user, message: text },
            function (data) {
                console.log(data);

                $.post('./Models/getNewMsg.php', {UserName: selected_user}, function (res) {
                    console.log(res);

                    var msg = "";
                    $.each(res, function (index, obj) {
                        msg +=  '<li class="msgText"><p class="username">'+ obj.user_name +'</p><p class="time">' + obj.time_sent + '</p><p class="reply">'
                            + obj.reply  + '</p></li>';

                    });

                    $('#createChat').hide("fast");
                    $('#sendNewMsg').hide("fast");
                    $('#sendMsg').show("fast");
                    $('#msgText').val("");
                    $('#msgs').html(msg);
                    $('#messages').scrollTop($('#messages')[0].scrollHeight);
                });
            });


    })

}); //end onload function


/**
 * Created by jessmount on 2017-04-05.
 */
