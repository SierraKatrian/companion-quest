$(document).ready(function() {
	//setInterval(function (){load()},500);

	$.getJSON("Models/get-messages.php", function(data) {
			console.log(data);
		});

	$('#chat_box').submit (function(event){
		event.preventDefault();
		var input = $('#chat-input').val();
		$.post("Models/insert-Chat.php", {msg:input}, function(data){
			console.log(data);
		})
	});

	//function to reload chat messages
	function load () {
		$.getJSON("Models/get-messages.php", function(data) {
			console.log(data);
		});
		$('#chat-output').html();
		$('#chat-output').scrollTop($('#chat-output').height());
	}
});