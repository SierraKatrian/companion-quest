$(document).ready(function(){
    // alert("working");

    // CREATE A GAME
    $('.dungeon-world-character-panel').hide();
    $('.apocalypse-world-character-panel').hide();
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

    // GET VALUE FROM RADIO BUTTON
    var radio = document.advancedSearch.ruleBook;
    for(var i = 0; i < radio.length; i++) {
        radio[i].onclick = function() {
            console.log(this.value)
            if (this.value == 1) {

                console.log("one")

                $('.dungeon-world-character-panel').slideUp();
                $('.apocalypse-world-character-panel').slideToggle();
                $.getJSON('./Models/View-AW-Chars.php', function(data){
                    console.log("connected")
                    var info = '<label>APOCALYPSE WORLD : Choose your characters</label>';
                    var char = 'AW';
                    console.log(char)
                    $.each(data, function(index, charInfo){
                        char += '<div class="col-sm-2 col-xs-3 character-thumb-container"> <label for="' + charInfo.role_name; + '"> <input id="' + charInfo.role_name; + '" class="character-chk" type="checkbox" name="availChars[]" value="' + charInfo.id; + '" /> <img class="character-img"  src="./Images/apocalypse-world-characters/' + charInfo.picture; + '" /> <p>' + charInfo.role_name; + '</p> </label> </div>';
                    });
                    $('#showAWChars').html(info + char);
                });
            } else if (this.value == 2) {

                console.log("two")

                $('.apocalypse-world-character-panel').slideUp();
                $('.dungeon-world-character-panel').slideToggle();
                $.getJSON('./Models/View-DW-Chars.php', function(data){
                    console.log("connected")
                    var info = '<label>DUNGEON WORLD : Choose your characters</label>';
                    var char = 'DW';
                    console.log(char)
                    $.each(data, function(index, charInfo){
                        char += '<div class="col-sm-2 col-xs-3 character-thumb-container"> <label for="' + charInfo.role_name; + '"> <input id="' + charInfo.role_name; + '" class="character-chk" type="checkbox" name="availChars[]" value="' + charInfo.id; + '" /> <img class="character-img"  src="./Images/dungeon-world-characters/' + charInfo.picture; + '" /> <p>' + charInfo.role_name; + '</p> </label> </div>';
                    });
                    $('#showDWChars').html(info + char);
                });
            } else {
                $('#showDWChars').html("something went wrong");
            }
        };
    }

});
