$(document).ready(function() {
	
	$('#chat-output').load("./Models/chatdisplay.php");
	$('#chatdisplayarea').scrollTop($('#chat-output').height());
	setInterval(function (){load()},500);

	$('#chat_box').submit (function(event){
		event.preventDefault();
		var input = $('#chat-input').val();
		if(input != ""){
			$.post("Models/insert-Chat.php", {msg:input}, function(data){
			})
			load();
			$('#chat-input').val('');
			$('#chatdisplayarea').scrollTop($('#chat-output').height());
		}
	});

	//function to reload chat messages
	function load () {
		$('#chat-output').html();	
		$('#chat-output').load("./Models/chatdisplay.php");
	}
});