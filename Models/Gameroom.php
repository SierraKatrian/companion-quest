<?php 

class GameRoom {
	private $roomid;
	private $roomName;
	private $roomLang;
	private $condition = [];
	public $query;

	public function getRoomId($db) {
		if(!empty($this->condition[0])){
			foreach($this->condition as $item) {
				if(is_null($this->query)){
					$this->query = "SELECT DISTINCT g.id FROM games g JOIN rulebooks r ON g.rb_id = r.id JOIN user_games ug ON g.id = ug.games_id JOIN users u ON ug.user_id = u.id WHERE $item";
				} else {
					$this->query .= "AND $item";
				}
			}
		} else {
			$this->query = "SELECT g.id FROM games g JOIN rulebooks r ON g.rb_id = r.id JOIN user_games ug ON g.id = ug.games_id JOIN users u ON ug.user_id = u.id";
		}
		
		$pdostmt = $db->prepare($this->query);
		$pdostmt->execute();
		$data = $pdostmt->fetchAll(PDO::FETCH_OBJ);
		return $data;
	}

	public function reset() {
		$this->condition = [];
	}

	public function setCondition($columnName, $value) {
		if ($columnName == 'game_name') {
			array_push($this->condition, "$columnName LIKE '%$value%'");
		}else {
			array_push($this->condition, "$columnName = '$value'");
		}
	}
	
	public function getRoom($db,$ids) {
		$query = "SELECT g.game_status,game_name,user_name,lang, max_players, name,g.id 
				FROM games g JOIN rulebooks r ON g.rb_id = r.id JOIN user_games ug ON g.id = ug.games_id JOIN users u ON ug.user_id = u.id 
				WHERE g.id = :id AND ug.permission = 1";
		$pdostmt = $db->prepare($query);
		$pdostmt->bindValue(":id", $ids);
		$pdostmt->execute();
		$data = $pdostmt->fetchAll(PDO::FETCH_OBJ);
		return $data;
	}

}

?>