$(document).ready(function() {
  //display all room first when the page load.
      $.get('Models/searchroom.php',{gameName:"", gametheme:"", gamelanguage:""}, function (data) {
        console.log(data);
        $.each(data, function(index,object){
          $("#search-output").append(
            "<tr><td>"+object[0].game_status+"</td><td>"+object[0].game_name+"</td><td>"+object[0].user_name+"</td><td>"+object[0].lang+"</td><td>"+object[0].max_players+"</td><td>"+object[0].name+"</td><td><button class=\"btn-primary request\" id=\""+object[0].game_name+"\">Send Request</button></td></tr>"
          );
        })
      });

    //submit event listener
  $( "#searchroom" ).submit(function( event ) {
      event.preventDefault();
      //emptying the search result
      $("#search-output").html("");

      //take all the input value
      var gamen = $('#gameName').val();
      var gamet = $('#gametheme').val();
      var gamel = $('#gamelanguage').val();

      //send get request with the search criteria
      $.get('Models/searchroom.php',{gameName:gamen, gametheme:gamet, gamelanguage:gamel}, function (data) {
        $.each(data, function(index,object){
          $("#search-output").append(
            "<tr><td>"+object[0].game_status+"</td><td>"+object[0].game_name+"</td><td>"+object[0].user_name+"</td><td>"+object[0].lang+"</td><td>"+object[0].max_players+"</td><td>"+object[0].name+"</td><td><button class=\"btn-primary request\" id=\""+object[0].game_name+"\">Send Request</button></td></tr>"
          );
        }) 
      });
  });
})