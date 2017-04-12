<?php
session_start();
require_once "DbConnect.php";
require_once "Gameroom.php";

$db = DbConnect::getDB();
$gameroom = new GameRoom();

	if (!empty($_GET['gameName'])){
		$gameroom->setCondition("game_name",$_GET['gameName']);
	}
	
	if (isset($_GET['gametheme'])) {
		if ($_GET['gametheme']!=""){
			$gameroom->setCondition("r.name",$_GET['gametheme']);
		}
	}

	if (isset($_GET['gamelanguage'])) {
		if ($_GET['gamelanguage']!=""){
			$gameroom->setCondition("lang",$_GET['gamelanguage']);
		}
	}

$roomids = $gameroom->getRoomId($db);

$rooms = array();

foreach($roomids as $item) {
	$data = $gameroom->getRoom($db, $item->id);
	array_push($rooms, $data);
}

$jrooms = json_encode($rooms);
header("Content-Type: application/json");

echo $jrooms;

?>