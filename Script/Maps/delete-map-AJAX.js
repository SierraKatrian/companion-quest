$(document).ready(function() {

    $('#deleteSelectedMapForm').submit(function(event){

        event.preventDefault();

        $.ajax({

            url:"./Models/DeleteMapAJAX.php",
            type:"POST",
            contentType:false,
            cache:false,
            processData:false,
            success:function(data){
                $('#current-map').html('<img src="Images/maps/default-map.png" alt="map" class="map-image default-map-image" style="width:100%">');
                $('#portal-map-image').html('<img src="Images/maps/default-map.png" alt="map" class="map-image default-map-image" style="width:100%">');
            }
        });//end of POST ajax

        $.ajax({

            type:"GET",
            url:"./Models/populate-gallery-AJAX.php",
            async:true,
            dataType:"html", //text, JSON, HTML or XML etc..
            success:function(data) {
                //console.log(data);
                $("#image-output").html(data);
            }

        });//end of AJAX

      });//end of click function

  });//end of document.ready
