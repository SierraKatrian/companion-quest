$(document).ready(function(){
    // alert("working");

    // CREATE A GAME
    // $('.dungeon-world-character-panel').hide();
    // $('.apocalypse-world-character-panel').hide();
    //
    // $('#apocalypse-theme-radio').click(function(){
    //     $('.apocalypse-world-character-panel').slideToggle();
    //     $('.dungeon-world-character-panel').hide();
    // });
    //
    // $('#dungeon-theme-radio').click(function(){
    //     $('.dungeon-world-character-panel').slideToggle();
    //     $('.apocalypse-world-character-panel').hide();
    // });

    function getAWChar(){
        $.getJSON('./Models/View-AW-Chars.php', function(data){
            console.log("connected")
            var info = '<div><h3>APOCALYPSE WORLD : Choose your characters</h3></div>';
            var char = '';
            console.log(info)
            $.each(data, function(index, charInfo){
                char += '<div class="col-sm-2 col-xs-3 character-thumb-container"> <label for="' + charInfo.role_name + '"> <input id="' + charInfo.role_name + '" class="character-chk" type="checkbox" name="availChars[]" value="' + charInfo.id + '" /> <img class="character-img" src="Images/apocalypse-world-characters/' + charInfo.picture + '" /> <p>' + charInfo.role_name + '</p> </label> </div>';
            });
            $('#showChars').html(info + char);
        });
    }

    function getDWChar(){
        $.getJSON('./Models/View-DW-Chars.php', function(data){
            console.log("connected")
            var info = '<div><h3>DUNGEON WORLD : Choose your characters</h3></div>';
            var char = '';
            console.log(info)
            $.each(data, function(index, charInfo){
                char += '<div class="col-sm-2 col-xs-3 character-thumb-container"> <label for="' + charInfo.role_name + '"> <input id="' + charInfo.role_name + '" class="character-chk" type="checkbox" name="availChars[]" value="' + charInfo.id + '" /> <img class="character-img" src="Images/dungeon-world-characters/' + charInfo.picture + '" /> <p>' + charInfo.role_name + '</p> </label> </div>';
            });
            $('#showChars').html(info + char);
        });
    }

    // GET VALUE FROM RADIO BUTTON
    var radio = document.advancedSearch.ruleBook;
    for(var i = 0; i < radio.length; i++) {
        radio[i].onclick = function() {
            console.log(this.value)
            if (this.value == 1) {
                console.log("one")
                $('.character-panel').slideDown();
                getAWChar();
            }
            else if (this.value == 2) {
                console.log("two")
                $('.character-panel').slideDown();
                getDWChar();
            } else {
                $('#showChars').html().replaceWith("something went wrong");
            }
        };
    }

});
