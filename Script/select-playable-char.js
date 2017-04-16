$(document).ready(function(){
    // alert("working");

    $('.character-bio-container').hide();

    // CREATE A GAME
    function getGameChar(){
        $.getJSON('./Models/View-Game-Chars.php', function(data){
            console.log("connected");
            var char = '';
            var bio = '';
                $.each(data, function(index, gameInfo){
                    char += '<div class="col-xs-3 character-thumb-container"> <label for="' + gameInfo.role_name + '"> <input id="' + gameInfo.role_name + '" class="character-chk" type="radio" name="availChars" value="' + gameInfo.id + '" /> <img class="' + ((gameInfo.selected == 1) ? "char-disabled" : "character-img") + '" src="Images/' + ((gameInfo.rb_id == 1) ? "apocalypse" : "dungeon") + '-world-characters/' + gameInfo.picture + '" /> <p>The ' + gameInfo.role_name + '</p> </label> </div>';

                    bio += '<div class="col-xs-6 character-bio"> <h3>' + gameInfo.role_name + '</h3> <p>' + gameInfo.bio + '</p> </div>';

                });
            $('#chooseChar').html(char);
            $('#charBio').html(bio);
            for (var i = 0; i < char.length; i++) {
                console.log(gameInfo);
            }
        });
    }

    getGameChar();

    // var character = document.selectPlayableChar.availChars;
    // for(var i = 0; i < character.length; i++) {
    //     character[i].onclick = function() {
    //         console.log(this.value);
    //     }
    // }

    $("#btn_select_char").click(function(){
        var radioValue = $("input[name='availChars']:checked").val();
        $.post('./Models/Select-Player-Char.php', {radioValue : radioValue}, function(data){
        });
        getGameChar();
    });

});
