<?php
session_start();
$userDetails = $_SESSION['user'];

$userID = $userDetails['id'];
$fname = $userDetails['f_name'];
$lname = $userDetails['l_name'];
$username = $userDetails['user_name'];
$email = $userDetails['email'];
$password = $userDetails['password'];

//game details
$gameDetails = $_SESSION['gameDetails'];

$ruleBook = $gameDetails['rb_id'];
$gameID = $gameDetails['id'];
$gameID = $gameDetails['id'];
$gameName = $gameDetails['game_name'];
$gameLanguage = $gameDetails['lang'];
$gamePlayerTotal = $gameDetails['max_players'];
$gameStatus = $gameDetails['game_status'];

require_once 'DbConnect.php';
require_once 'AvailCharactersDAO.php';

$dbClass = new DbConnect();
$db = $dbClass->getDB();

$charID = 2;
$selectedChar = $_POST['selectChar'];

$availCharClass = new AvailCharactersDAO();
$selectedChars = $availCharClass->getGameChars($db, $gameID);

$jSaveDice = json_encode($selectedChars);

header("Content-Type: application/json");
echo $jSaveDice;
?>
