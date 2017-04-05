$(document).ready(function() {
	$("#img-form").submit(function(event){
		event.preventDefault();
		var file_data = $('#avatarForm__upload').val();

		$.ajax({
			url: "./Models/processupload.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			success: function(data){
				console.log(data);
				$("#output").html("");
				$.getJSON('Models/getavatar.php',function(data) {	
					$.each(data, function(i, item) {
						$("#output").append("<a href=\'?id="+item.id+"\'><img src=\'"+item.image_url+"\' alt='avatar image' class='img-thumbnail col-md-3' width='304' height='236' /></a>");
					})
				})
			},
			error: function(){} 	        
		});
	});
});