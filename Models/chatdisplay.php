<?php 
session_start();

require_once "DbConnect.php";
require_once "ChatDAO.php";

$db = DbConnect::getDB();

$chat = new Chat();
$entries = $chat->getChat($db, $_SESSION['chatroom']['id']);

foreach ($entries as $items) {
	echo "<div class=\"msg-line\">
	<tr>
		<td>"
			.$items['user_name']." said:".
			"</td>
		</tr>
		<tr>
			<td>"
				.$items['message'].
				"</td>
				<td>"
					."<span class=\"msg-timestamp\" style=\"float:right; font-style:italic;\">".$items['timestamp'].
					"</span></td>
				</tr>
			</div>";
}

?>