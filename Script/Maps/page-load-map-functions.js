$(document).ready(function() {

          //alert('hello')
          $.getJSON("./Models/ShowMapAjax.php",function (data){
                 //console.log(data);
                 $('#current-map').html('<img src="data:image;base64,' + data[0][3] + '">');
                 $('#portal-map-image').html('<img src="data:image;base64,' + data[0][3] + '" alt="map" class="map-image" style="width:100%">');
            })//end of getJSON function

  });//end of document.ready
