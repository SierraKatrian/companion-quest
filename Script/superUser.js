/**
 * Created by jessmount on 2017-04-19.
 */

$(document).ready(function () {

    $('#user_table').on('click', '.admin', function() {

        if (confirm('Make this user an admin?')) {

            var userID = $(this).attr('id');


            $.post('Models/makeAdmin.php', {user_id: userID}, function (data) {

                console.log(data);

            });

        }

    });


    $('#user_table').on('click', '.delete', function() {

        if (confirm('Delete this user?')) {

            var userID = $(this).attr('id');


            $.post('Models/deleteUser.php', {user_id: userID}, function (data) {

                console.log(data);

            });

        }

    });

});