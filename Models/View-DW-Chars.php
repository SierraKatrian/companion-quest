<?php
require_once 'DbConnect.php';
require_once 'AvailCharactersDAO.php';

$dbClass = new DbConnect();
$db = $dbClass->getDB();

$availCharClass = new AvailCharactersDAO();
$viewDWChars = $availCharClass->getAvailCharacters($db, 2);

$jViewChars = json_encode($viewDWChars);

header("Content-Type: application/json");
echo $jViewChars;
?>
