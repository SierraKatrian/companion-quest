<?php
require_once 'DbConnect.php';
require_once 'AvailCharactersDAO.php';

$dbClass = new DbConnect();
$db = $dbClass->getDB();

$availCharClass = new AvailCharactersDAO();
$viewAWChars = $availCharClass->getAvailCharacters($db, 1);

$jViewChars = json_encode($viewAWChars);

header("Content-Type: application/json");
echo $jViewChars;

?>
