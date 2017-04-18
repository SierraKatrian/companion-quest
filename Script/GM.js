/**
 * Created by jessmount on 2017-04-11.
 */

$(document).ready(function(){



    var game_name = "pooppoop";
    var games_id = "";


    //populate the active players tab

    $.post('Models/GM-Players.php', {gameName : game_name}, function (data) {
        console.log(data);

        var players = "";

        $.each(data, function (index, obj) {

            players
                += '<tr><td><a href="#" data-toggle="tooltip" data-placement="right" title="access granted">' +
                '<img class="access-colours" src="./Images/status-colours/access-granted.svg" alt="access granted" />' +
                '</a>' +
                '<div class="dropdown">' +
                '<button type="button" class="btn btn-link btn-dropdown-options dropdown-toggle" data-toggle="dropdown">' +
                'Active<span class="caret" data-toggle="dropdown"></span></button>' + '<ul class="dropdown-menu">' +
                '<li class=""><a href="#" id="'+obj.user_id+'" data-id=" '+ obj.games_id +'" class="drop-down-options-list delete">delete</a></li>' +
                '<li class=""><a href="#" id="'+obj.user_id+'" data-id=" '+ obj.games_id + '" class="drop-down-options-list makeGM">make GM</a></li></ul></div></td>' +
                '<td class="getUser">' + obj.user_name + '</td><td><button type="button" class="btn btn-link">' + obj.name +
                '<i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td><td>' + obj.role_name + '</td></tr>';


        });


        $('#playerList').html(players);


    });


    //populate the requests tab

    $.post('Models/GM-Pending.php', {gameName : game_name}, function (data){



       var players = "";
        $.each(data, function (index, obj) {

            var playerStatus = obj.player_status;


            switch (playerStatus) {

                case '3':
                    players
                        += '<tr><td><a href="#" data-toggle="tooltip" data-placement="right" title="access granted">' +
                        '<img class="access-colours" src="./Images/status-colours/request-pending.svg" alt="access granted" />' +
                        '</a>' +
                        '<div class="dropdown">' +
                        '<button type="button" class="btn btn-link btn-dropdown-options dropdown-toggle" data-toggle="dropdown">' +
                        'Request<span class="caret" data-toggle="dropdown"></span></button>' +
                        '<ul class="dropdown-menu">' +
                        '<li class=""><a href="#" id="'+obj.user_id+'" data-id=" '+ obj.games_id + '" class="drop-down-options-list accept">accept</a></li>' +
                        '<li class=""><a href="#" id="'+obj.user_id+'" data-id=" '+ obj.games_id + '"class="drop-down-options-list decline">decline</a></li></ul></div></td>' +
                        '<td class="getUser">' + obj.user_name + '</td></tr>';
                    break;

                case '4':
                    players
                        += '<tr><td><a href="#" data-toggle="tooltip" data-placement="right" title="access granted">' +
                        '<img class="access-colours" src="./Images/status-colours/invite-pending.svg" alt="access granted" />' +
                        '</a>' +
                        '<div class="dropdown">' +
                        '<button type="button" class="btn btn-link btn-dropdown-options dropdown-toggle" data-toggle="dropdown">' +
                        'Invited<span class="caret" data-toggle="dropdown"></span></button>' +
                        '<ul class="dropdown-menu">' +
                        '<li class=""><a href="#" id="'+ obj.user_id +'" data-id=" '+ obj.games_id + '" class="drop-down-options-list delete">delete</a></li>' +
                        '<td class="getUser">' + obj.user_name + '</td></tr>';
                    break;

                default: players += "";

            }//end switch


        });

            $('#pending').html(players);

    }); //end requests


    //if clicked, grab user id and games id send to php.


    $('#pending').on('click', '.accept', function(){

        if (confirm('Accept this user?')) {

            var userID = $(this).attr('id');
            var gameID = $(this).attr('data-id');

            $.post('Models/acceptRequest.php', {game_id: gameID, user_id: userID}, function () {

                console.log('user Accepted');

            });

        }else{
            console.log('cancelled');
        }







    } );

    $('#pending').on('click', '.decline', function(){


        if (confirm('Decline this user?')) {

            var userID = $(this).attr('id');
            var gameID = $(this).attr('data-id');

            $.post('Models/declineRequest.php', {game_id: gameID, user_id: userID}, function () {

                console.log('user Declined');

            });

        }else{
            console.log('cancelled');
        }




    } );


    $('#playerList').on('click', '.delete', function(){


        if (confirm('Delete this player from game?')) {

            var userID = $(this).attr('id');
            var gameID = $(this).attr('data-id');

            $.post('Models/removeRequest.php', {game_id: gameID, user_id: userID}, function () {

                console.log('user Removed');

            });

        }else{
            console.log('cancelled');
        }




    } );

    $('#playerList').on('click', '.makeGM', function(){


        if (confirm('Make this player the Game Master? (You will be removed from the game)')) {

            var userID = $(this).attr('id');
            var gameID = $(this).attr('data-id');

            $.post('Models/switchGM.php', {game_id: gameID, user_id: userID}, function () {

                console.log('user now GM');

            });

        }else{
            console.log('cancelled');
        }



    } );














});
