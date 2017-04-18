<?php
require_once 'DbConnect.php';
require_once 'CharacterDAO.php';

$dbClass = new DbConnect();
$db = $dbClass->getDB();

$charClass = new CharacterDAO();
$viewDWChars = $charClass->getAvailCharacters($db, 2);

$jViewDWChars = json_encode($viewDWChars);

header("Content-Type: application/json");
echo $jViewDWChars;
?>
