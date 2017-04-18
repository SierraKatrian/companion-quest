$(document).ready(function(){
    // alert("working");

    $('.character-bio-container').hide();

    // CREATE A GAME
    function getGameChar(){
        $.getJSON('./Models/View-Game-Chars.php', function(data){
            console.log("connected");
            var char = '';
                $.each(data, function(index, gameInfo){
                    char += '<div class="col-xs-3 character-thumb-container"> <label for="' + gameInfo.role_name + '"> <input id="' + gameInfo.role_name + '" class="character-chk" type="radio" name="availChars" value="' + gameInfo.role_id + '" /> <img class="' + ((gameInfo.selected == 1) ? "char-disabled" : "character-img") + '" src="Images/' + ((gameInfo.rb_id == 1) ? "apocalypse" : "dungeon") + '-world-characters/' + gameInfo.picture + '" /> <p>The ' + gameInfo.role_name + '</p> </label> </div>';
                });
            $('#chooseChar').html(char);
        });
    }

    getGameChar();

    $("#btn_select_char").click(function(){
        var radioValue = $("input[name='availChars']:checked").val();
        $.post('./Models/Select-Player-Char.php', {radioValue : radioValue}, function(data){
        });
        getGameChar();
    });

});
