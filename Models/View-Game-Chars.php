<?php
session_start();
$gameDetails = $_SESSION['gameDetails'];
$gameID = $gameDetails['id'];

require_once 'DbConnect.php';
require_once 'AvailCharactersDAO.php';

$dbClass = new DbConnect();
$db = $dbClass->getDB();

$availCharClass = new AvailCharactersDAO();
$selectedChars = $availCharClass->getGameChars($db, $gameID);

$jGameChars = json_encode($selectedChars);

// var_dump($jGameChars);

header("Content-Type: application/json");
echo $jGameChars;
?>
