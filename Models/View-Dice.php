<?php

require_once 'DbConnect.php';
require_once 'DiceDAO.php';

$dbClass = new DbConnect();
$db = $dbClass->getDB();

$charID = 2;
$diceClass = new DiceDAO();
$viewSavedDice = $diceClass->getSavedDice($db, $charID);

$jSavedDice = json_encode($viewSavedDice);

header("Content-Type: application/json");
echo $jSavedDice;

?>
