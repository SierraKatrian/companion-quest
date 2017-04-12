<?php 

class ChatRoom {
	public function setChatRoom ($db, $roomid) {
		$query = "INSERT INTO chat_rooms(game_id)
					VALUES (:id)";
		$pdostmt = $db->prepare($query);
		$pdostmt->bindValue(":id", $roomid);
		$pdostmt->execute();
	}
}
?>