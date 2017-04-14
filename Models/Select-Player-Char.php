<?php
session_start();

require_once 'DbConnect.php';
require_once 'AvailCharactersDAO.php';

$dbClass = new DbConnect();
$availCharClass = new AvailCharactersDAO();
$db = $dbClass->getDB();

//game details
$gameDetails = $_SESSION['gameDetails'];
$gameID = $gameDetails['id'];

$selectedChar = $_POST['radioValue'];

$disableSelectedChars = $availCharClass->disableSelectedChar($db, $selectedChar, $gameID);
$jDisSelChars = json_encode($disableSelectedChars);

header("Content-Type: application/json");
echo $jDisSelChars;
?>
