<?php
require_once 'DbConnect.php';
require_once 'CharacterDAO.php';

$dbClass = new DbConnect();
$db = $dbClass->getDB();

$charClass = new CharacterDAO();
$viewAWChars = $charClass->getAvailCharacters($db, 1);

$jViewAWChars = json_encode($viewAWChars);
// var_dump($jViewAWChars);
header("Content-Type: application/json");
echo $jViewAWChars;
?>
