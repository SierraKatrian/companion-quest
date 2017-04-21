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
		<td class=\"sender-name\">"
			.$items['user_name']." said:".
			"</td>
		</tr>
		<tr>
			<td class= \"msgcontent\">"
				.$items['message'].
				"</td>
				<td class= \"msgtime\">"
					."<span class=\"msg-timestamp\" style=\"float:right; font-style:italic;\">".$items['timestamp'].
					"</span></td>
				</tr>
			</div>";
}
	echo "<br/><br/>"
?>