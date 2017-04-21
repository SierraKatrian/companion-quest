<?php

/****************************

Created By: Sierra Katrian
Year: 2017

****************************/

session_start();
$ruleBook = $_SESSION['games']['rb_id'];
$gameID = $_SESSION['games']['games_id'];
$gameName = $_SESSION['games']['game_name'];
$gameLanguage = $_SESSION['games']['lang'];
$gamePlayerTotal = $_SESSION['games']['max_players'];
$gameStatus = $_SESSION['games']['game_status'];

require_once 'DbConnect.php';
require_once 'CharacterDAO.php';

$dbClass = new DbConnect();
$db = $dbClass->getDB();

$charClass = new CharacterDAO();
$selectedChars = $charClass->getGameChars($db, $gameID);

$jGameChars = json_encode($selectedChars);

// var_dump($selectedChars);

header("Content-Type: application/json");
echo $jGameChars;
?>
