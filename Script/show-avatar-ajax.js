$(document).ready(function() {
	$.getJSON('Models/getDisplayedAvatar.php',function(data) {
		if(data==[]){
			$('#avatar-container').html("<a href=\"#\" data-toggle=\"modal\" data-target=\"#AvatarModal\"><img class='nav-pic' src='Images/profilepic.png' alt='profile picture'/></a>");
		} else {
			$('#avatar-container').html("<a href=\"#\" data-toggle=\"modal\" data-target=\"#AvatarModal\"><img class='nav-pic' src='"+data[0]+"' alt='profile picture'/></a>");
		}
	})

	$.getJSON('Models/getavatar.php',function(data) {
		$.each(data, function(i, item) {
			$("#output").append("<div id='"+item.id+"' class='avatar-sel'><img src=\'"+item.image_url+"\' alt='avatar image' class='img-thumbnail col-md-3' width='304' height='236' /></div>");
		})
	})

	$('#output').on('click', '.avatar-sel', function () {
		var selected = this.id;
		$.post('Models/setAvatar.php',{sel: selected},function(data) {
		});
		$.getJSON('Models/getDisplayedAvatar.php',function(data) {
			$('#avatar-container').html("<a href=\"#\" data-toggle=\"modal\" data-target=\"#AvatarModal\"><img class='nav-pic' src='"+data[0]+"' alt='profile picture'/></a>");
		})
	});


});

