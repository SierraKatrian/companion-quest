<?php
require_once 'DbConnect.php';
require_once 'DiceDAO.php';

$dbClass = new DbConnect();
$db = $dbClass->getDB();

$charID = 2;
$numSides = $_POST['sides'];
$numDice = $_POST['quantity'];
$modNum = $_POST['modifier'];

$diceClass = new DiceDAO();
$saveDice = $diceClass->saveDice($db, $charID, $numSides, $numDice, $modNum);

$jSaveDice = json_encode($saveDice);

header("Content-Type: application/json");
echo $jSaveDice;
?>
