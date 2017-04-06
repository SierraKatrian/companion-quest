$(document).ready(function(){
    // alert("working");

    // CREATE A GAME
    $('#dungeon-world-character-panel').hide();
    $('#apocalypse-world-character-panel').hide();

    $('#apocalypse-theme-radio').click(function(){
        $('#apocalypse-world-character-panel').slideToggle();
        $('#dungeon-world-character-panel').hide();
    });

    $('#dungeon-theme-radio').click(function(){
        $('#dungeon-world-character-panel').slideToggle();
        $('#apocalypse-world-character-panel').hide();
    });


});
