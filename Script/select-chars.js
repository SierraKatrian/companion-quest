$(document).ready(function(){

    function AWCharSheet(){
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

    function DWCharSheet(){
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

    var availChar = document.selectChar.availChar;
    for(var i = 0; i < availChar.length; i++) {
        availChar[i].onclick = function() {
            console.log(this.value)

                $('#charSheet').html(this.value);
        };
    }
});
