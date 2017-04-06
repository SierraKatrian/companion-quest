<?php
require_once 'database.php';
require_once 'dicedao.php';

$dbClass = new Database();
$db = $dbClass->getDb();

$charID = 4;
$numSides = $_POST['sides'];
$numDice = $_POST['quantity'];
$modNum = $_POST['modifier'];

$diceClass = new DiceDAO();
$saveDice = $diceClass->saveDice($db, $charID, $numSides, $numDice, $modNum);

$jSaveDice = json_encode($saveDice);

header("Content-Type: application/json");
echo $jSaveDice;
?>
