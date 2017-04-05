<?php 

class GameRoom {
	private $roomid;
	private $roomName;
	private $roomLang;
	private $condition = [];
	private $query;

	public function getRoom() {
		if(!empty($this->condition[0])){
			foreach($this->condition as $item) {
				if(is_null($this->query)){
					$this->query = "SELECT g.status,game_name,user_name,lang, max_players,name FROM games g JOIN rulebooks r ON g.rb_id = r.id JOIN user_games ug ON g.id = ug.games_id JOIN users u ON ug.user_id = u.id WHERE $item";
				} else {
					$this->query .= "AND $item";
				}
			}
		} else {
			$this->query = "SELECT g.status,game_name,user_name,lang, max_players,name FROM games g JOIN rulebooks r ON g.rb_id = r.id JOIN user_games ug ON g.id = ug.games_id JOIN users u ON ug.user_id = u.id";
		}
		
		$dbc = new Dbconnect();
		$db = $dbc->getDb('companionq');
		$pdostmt = $db->prepare($this->query);
		$pdostmt->execute();
		$data = $pdostmt->fetchAll(PDO::FETCH_OBJ);
		return $data;
	}

	public function setCondition($columnName, $value) {
		if ($columnName == 'game_name') {
			array_push($this->condition, "$columnName LIKE '%$value%'");
		}else {
			array_push($this->condition, "$columnName = '$value'");
		}
	}
	
	public function showRoom($input) {
		foreach($input as $item) {
			echo "<tr>
				<td>
					$item->status             
				</td>
				<td>$item->game_name</td>
				<td>$item->user_name</td>
				<td>$item->lang</td>
				<td>$item->max_players</td>
				<td>$item->name</td>
			</tr>";
		}
	}
}

?>