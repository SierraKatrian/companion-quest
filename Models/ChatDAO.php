<?php 

class Chat {
	private $userId;
	private $mssg;

	public function getChat ($db, $gameId) {
		$query = "SELECT message, timestamp, user_name
					FROM chat_log cl JOIN chat_rooms cr ON cl.id=cr.chat_id JOIN games g ON cr.game_id=g.id JOIN users u ON cl.user_id = u.id
					WHERE game_id = :gameId";
		$pdostmt = $db->prepare($query);
		$pdostmt->bindValue(":gameId", $gameId);
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

	public function addChat ($db, $time) {
		$query = "INSERT INTO chat_log(user_id, message, timestamp)
					VALUES (:userId, :mssg, :timenow)";
		$pdostmt = $db->prepare($query);
		$pdostmt->bindValue(":userId", $this->userId);
		$pdostmt->bindValue(":mssg", $this->mssg);
		$pdostmt->bindValue(":timenow", $time);
		$pdostmt->execute();
	}

}

?>