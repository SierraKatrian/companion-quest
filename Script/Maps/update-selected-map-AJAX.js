$(document).ready(function() {

    $('#galleryForm').on('click', '.map-thumb', function(event){

        event.preventDefault();

        var id = this.id;
        console.log(id);
        $.post("./Models/UpdateSelectedMapAJAX.php", {id: id}, function(data){});//end of .post function

        $.getJSON("./Models/ShowMapAjax.php",function(data){
             console.log(data);
             $('#current-map').html('<img src="data:image;base64,' + data[0][3] + '">');
             $('#portal-map-image').html('<img src="data:image;base64,' + data[0][3] + '" alt="map" class="map-image" style="width:100%">');
        })//end of getJSON function

    });//end of click function

});//end of document.ready
