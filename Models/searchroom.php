<?php

$gameroom = new GameRoom();

	if (!empty($_GET['gameName'])){
		$gameroom->setCondition("game_name",$_GET['gameName']);
	}
	
	if (isset($_GET['gametheme'])) {
		if ($_GET['gametheme']!="chooseTheme"){
			$gameroom->setCondition("r.name",$_GET['gametheme']);
		}
	}

	if (isset($_GET['gamelanguage'])) {
		if ($_GET['gamelanguage']!="chooseLanguage"){
			$gameroom->setCondition("lang",$_GET['gamelanguage']);
		}
	}

$rooms = $gameroom->getRoom();

$gameroom->showRoom($rooms);

?>