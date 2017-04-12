$(document).ready(function(){
    // alert("working");

    function getGameChars(){
        $.getJSON('./Models/View-Game-Chars.php', function(data){
            console.log("connected")
            // var info = '<div><h3>' + data.name + ' : Choose your characters</h3></div>';
            var char = '';
            // console.log(info)
            $.each(data, function(index, gameInfo){
                console.log(gameInfo.role_name)
                char += '<div class="col-sm-2 col-xs-3 character-thumb-container"> <label for="' + gameInfo.role_name + '"> <input id="' + gameInfo.role_name + '" class="character-chk" type="checkbox" name="availChars[]" value="' + gameInfo.id + '"' + ((gameInfo.permissions == 1) ? "checked" : "") + '/> <img class="character-img" src="Images/apocalypse-world-characters/' + gameInfo.picture + '" /> <p>' + gameInfo.role_name + '</p> </label> </div>';
            });
            $('#showChars').html(char);
        });
    }

    getGameChars();

    function updateGameChars() {

    }

});
