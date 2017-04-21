<?php 

class Chat {
	private $userId;
	private $mssg;

	public function getChat ($db, $croomId) {
		$query = "SELECT message, timestamp, user_name, user_id
					FROM chat_log cl JOIN chat_rooms cr ON cl.chatroom_id=cr.id JOIN users u ON cl.user_id = u.id
					WHERE chatroom_id = :croomId";
		$pdostmt = $db->prepare($query);
		$pdostmt->bindValue(":croomId", $croomId);
		$pdostmt->execute();
		$data = $pdostmt->fetchAll();
		return $data;
	}

	public function setUserId($input) {
		$this->userId = $input;
	}

	public function setChatDetail ($userId, $mssg) {
		$this->userId = $userId;
		$this->mssg = $mssg;
	}

	public function addChat ($db, $time, $chatroomid) {
		$query = "INSERT INTO chat_log(user_id, chatroom_id, message, timestamp)
					VALUES (:userId, :chatid, :mssg, :timenow)";
		$pdostmt = $db->prepare($query);
		$pdostmt->bindValue(":userId", $this->userId);
		$pdostmt->bindValue(":mssg", $this->mssg);
		$pdostmt->bindValue(":timenow", $time);
		$pdostmt->bindValue(":chatid", $chatroomid);
		$pdostmt->execute();
	}

	public function getChatRoomId ($db) {
		$query = "SELECT c.id
					FROM chat_rooms c JOIN games g ON cr.game_id=g.id 
					WHERE game_id = :gameId";
		$pdostmt = $db->prepare($query);
		$pdostmt->bindValue(":gameId", $gameId);
		$pdostmt->execute();
		$data = $pdostmt->fetchAll();
		return $data;
	}

}

?>