$(document).ready(function(){
    // alert("working");

    // CREATE A GAME
    function getGameChar(){
        $.getJSON('./Models/View-Game-Chars.php', function(data){
            console.log("connected");
            var char = '';
                $.each(data, function(index, gameInfo){
                    char += '<div class="col-sm-12 character-thumb-container"> <label for="' + gameInfo.role_name + '"> <input id="' + gameInfo.id + '" class="character-chk" type="radio" name="selectChar" value="' + gameInfo.id + '" ' + ((gameInfo.selected == 1) ? 'disabled=disabled' : '') + ' /> <img class="' + ((gameInfo.selected == 1) ? "char-disabled" : "character-img") + '" src="Images/' + ((gameInfo.rb_id == 1) ? "apocalypse" : "dungeon") + '-world-characters/' + gameInfo.picture + '" /> <p>The ' + gameInfo.role_name + '</p> </label> <button id="btn_select_char" class="btn btn-primary ' + ((gameInfo.selected == 1) ? "disabled" : "active") + '" type="button" name="btn_select_char" value="' + gameInfo.id + '">Select the ' + gameInfo.role_name + '</button> </div>';
            });
            $('#chooseChar').html(char);
        });
    }

    getGameChar();

    // console.log(selectCharVal);
    $('#selectPlayableChar').on('click', '#btn_select_char', function() {
        var id = $(this).val();
        var role = $('#' + id);
        console.log(id);
        console.log(role);
        $.post('./Models/Select-Player-Char.php', {role : role}, function(data){
            console.log('posted' + id);
        });
    });

    // GET VALUE FROM RADIO BUTTON
    // var rulebook = document.advancedSearch.ruleBook;
    // for(var i = 0; i < rulebook.length; i++) {
    //     rulebook[i].onclick = function() {
    //         console.log(this.value)
    //         if (this.value == 1) {
    //             console.log("one");
    //             // $('.character-panel').slideDown();
    //             getAWChar();
    //         } else if (this.value == 2) {
    //             console.log("two");
    //             // $('.character-panel').slideDown();
    //             getDWChar();
    //         } else {
    //             $('#chooseChar').html("something went wrong");
    //         }
    //     };
    // }
});
