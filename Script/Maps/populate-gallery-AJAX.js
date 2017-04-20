$(document).ready(function() {

    //this populates the gallery

    $('#edit-image-panel').click(function(event){

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

    $('#map-upload-btn').click(function(event){

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
