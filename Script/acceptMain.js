

/**
 * Created by jessmount on 2017-04-18.
 */


$(document).ready(function () {



    $('#invReq').on('click', '.accept', function() {

        if (confirm('Accept this Request?')) {

            var gameID = $(this).attr('id');


            $.post('Models/acceptMain.php', {game_id: gameID}, function (data) {

            console.log(data);

            });

        }

    });



    $('#invReq').on('click', '.decline', function() {


        if (confirm('Decline this Request?')) {

            var gameID = $(this).attr('id');

            $.post('Models/declineMain.php', {game_id: gameID}, function (data) {


            });

        } else {
            console.log('cancelled');
        }

    });


    });