<?php

/****************************

Created By: Sierra Katrian
Year: 2017

****************************/

session_start();

require_once 'DbConnect.php';
require_once 'DiceDAO.php';

$dbClass = new DbConnect();
$db = $dbClass->getDB();

$diceClass = new DiceDAO();
//User details
$userDetails = $_SESSION['user'];

$userID = $userDetails['id'];
$fname = $userDetails['f_name'];
$lname = $userDetails['l_name'];
$username = $userDetails['user_name'];
$email = $userDetails['email'];
$password = $userDetails['password'];

//Game details
$ruleBook = $_SESSION['games']['rb_id'];
$gameID = $_SESSION['games']['games_id'];
$gameName = $_SESSION['games']['game_name'];
$gameLanguage = $_SESSION['games']['lang'];
$gamePlayerTotal = $_SESSION['games']['max_players'];
$gameStatus = $_SESSION['games']['game_status'];

$charID = $_SESSION['characters']['id'];
$roleID = $_SESSION['characters']['role_id'];

$viewSavedDice = $diceClass->getSavedDice($db, $userID, $gameID);

$jSavedDice = json_encode($viewSavedDice);

header("Content-Type: application/json");
echo $jSavedDice;

?>
