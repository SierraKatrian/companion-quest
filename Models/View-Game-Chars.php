<?php
session_start();
$gameDetails = $_SESSION['gameDetails'];
$gameID = $gameDetails['id'];

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
