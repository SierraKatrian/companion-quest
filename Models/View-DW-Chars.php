<?php
require_once 'DbConnect.php';
require_once 'AvailCharactersDAO.php';

$dbClass = new DbConnect();
$db = $dbClass->getDB();

$rbID = 2;
$availCharClass = new AvailCharactersDAO();
$viewAvailChars = $availCharClass->getAvailCharacters($db, $rbID);

$jViewChars = json_encode($viewAvailChars);

header("Content-Type: application/json");
echo $jViewChars;
?>
