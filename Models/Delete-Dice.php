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

$id = $_POST['id'];

$diceClass = new DiceDAO();
$deleteDice = $diceClass->deleteDice($db, $id);

$jDeleteDice = json_encode($deleteDice);

header("Content-Type: application/json");
echo $jDeleteDice;

?>
