$(document).ready(function() {

    $.getJSON("./Models/ShowMapAjax.php",function (data){
           $('#game-room-map-image').html('<img src="data:image;base64,' + data[0][3] + '" class="game-room-map-img">');
      })//end of getJSON function

});
