$(document).ready(function() {

    $('#mapsForm').submit(function(event){

        //$('.default-map-image').css('display','none');

        event.preventDefault();

        $.ajax({

            url:"./Models/UploadImageAJAX.php",
            type:"POST",
            data:new FormData(this), //this sends form data to key/value pairs (form fields & values)
            contentType:false,
            cache:false,
            processData:false,
            success:function(data){
                //check if upload is empty
                console.log(data);
                if ($('#map-upload-file').get(0).files.length === 0) {
                    $.getJSON("./Models/ShowMapAjax.php",function(data){
                         $('#current-map').html('<img src="data:image;base64,' + data[0][3] + '">');
                         $('#portal-map-image').html('<img src="data:image;base64,' + data[0][3] + '" alt="map" class="map-image" style="width:100%">');
                         $( ".upload-map-error-message" ).html("No file uploaded");
                    })//end of getJSON function
                } else {
                    $.getJSON("./Models/ShowMapAjax.php",function(data){
                         $('#current-map').html('<img src="data:image;base64,' + data[0][3] + '">');
                         $('#portal-map-image').html('<img src="data:image;base64,' + data[0][3] + '" alt="map" class="map-image" style="width:100%">');
                         $( ".upload-map-error-message" ).html("");
                    })//end of getJSON function
                }
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

        });//end of GET AJAX

    });//end of click function

});//end of document.ready
