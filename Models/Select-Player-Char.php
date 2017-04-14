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
$gameName = $gameDetails['game_name'];
$gameLanguage = $gameDetails['lang'];
$gamePlayerTotal = $gameDetails['max_players'];
$gameStatus = $gameDetails['game_status'];

require_once 'DbConnect.php';
require_once 'AvailCharactersDAO.php';

$dbClass = new DbConnect();
$db = $dbClass->getDB();

$selectedChar = $_POST['selectChar'];

$availCharClass = new AvailCharactersDAO();
$disableSelectedChars = $availCharClass->disableSelectedChar($db, $selectedChar, $gameID)

$jDisSelChars = json_encode($disableSelectedChars);

header("Content-Type: application/json");
echo $jDisSelChars;
?>
