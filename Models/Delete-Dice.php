<?php
require_once 'database.php';
require_once 'dicedao.php';

$dbClass = new Database();
$db = $dbClass->getDb();

$id = $_POST['id'];

$diceClass = new DiceDAO();
$deleteDice = $diceClass->deleteDice($db, $id);

$jDeleteDice = json_encode($deleteDice);

header("Content-Type: application/json");
echo $jDeleteDice;

?>
