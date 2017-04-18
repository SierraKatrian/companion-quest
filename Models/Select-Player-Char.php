<?php
session_start();

//User details
$userDetails = $_SESSION['user'];

$userID = $userDetails['id'];
$fname = $userDetails['f_name'];
$lname = $userDetails['l_name'];
$username = $userDetails['user_name'];
$email = $userDetails['email'];
$password = $userDetails['password'];

//Game details
$gameDetails = $_SESSION['gameDetails'];

$ruleBook = $gameDetails['rb_id'];
$gameID = $gameDetails['id'];
$gameName = $gameDetails['game_name'];
$gameLanguage = $gameDetails['lang'];
$gamePlayerTotal = $gameDetails['max_players'];
$gameStatus = $gameDetails['game_status'];

require_once 'DbConnect.php';
require_once 'CharacterDAO.php';

$dbClass = new DbConnect();
$db = $dbClass->getDB();

$charClass = new CharacterDAO();

$selectedChar = $_POST['radioValue'];
$setPlayerChar = $charClass->setPlayerChar($db, $userID, $selectedChar, $gameID);
$disableSelectedChars = $charClass->disableSelectedChar($db, $selectedChar, $gameID);

$jDisSelChars = json_encode($disableSelectedChars);
$jSetPlayerChar = json_encode($setPlayerChar);

header("Content-Type: application/json");
echo $jDisSelChars;
echo $jSetPlayerChar;
?>
