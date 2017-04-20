$(document).ready(function() {
	setInterval(function (){load()},500);
	$('#chat-output').load("./Models/chatdisplay.php");

	$('#chat_box').submit (function(event){
		event.preventDefault();
		var input = $('#chat-input').val();
		$.post("Models/insert-Chat.php", {msg:input}, function(data){
			load();
			console.log(data);
		})
	});

	//function to reload chat messages
	function load () {
		$('#chat-output').html();
		$('#chat-output').scrollTop($('#chat-output').height());
		$('#chat-output').load("./Models/chatdisplay.php");
	}
});