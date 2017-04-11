<?php
require_once 'DbConnect.php';
require_once 'AvailCharactersDAO.php';

$dbClass = new DbConnect();
$db = $dbClass->getDB();

$rbID = 2;

$availCharClass = new AvailCharactersDAO();
$viewDWChars = $availCharClass->getAvailCharacters($db, $rbID);

$jViewDWChars = json_encode($viewDWChars);

header("Content-Type: application/json");
echo $jViewDWChars;
?>
