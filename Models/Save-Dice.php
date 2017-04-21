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

//User details
$userDetails = $_SESSION['user'];

$userID = $userDetails['id'];

//Game details
$gameID = $_SESSION['games']['games_id'];

$numSides = $_POST['sides'];
$numDice = $_POST['quantity'];
$modNum = $_POST['modifier'];

$diceClass = new DiceDAO();
$saveDice = $diceClass->saveDice($db, $userID, $gameID, $numSides, $numDice, $modNum);

$jSaveDice = json_encode($saveDice);

header("Content-Type: application/json");
echo $jSaveDice;
?>
