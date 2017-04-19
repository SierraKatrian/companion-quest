/**
 * Created by jessmount on 2017-04-11.
 */

$(document).ready(function (){

    $('#search-output').on('click', '.request', function(){


        var game_name = $(this).attr('id');
        console.log(game_name);

        $.post('Models/joinRequest.php', {gameName : game_name}, function (res){

            alert('Your request has been sent to the game master.');
            console.log(res);
            //change class of the button to make it grayed out, not clickable and says pending.

        });

    });



















}); //end on load function