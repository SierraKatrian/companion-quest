<?php
require_once 'DbConnect.php';
require_once 'AvailCharactersDAO.php';

$dbClass = new DbConnect();
$db = $dbClass->getDB();

$rbID = 1;

$availCharClass = new AvailCharactersDAO();
$viewAWChars = $availCharClass->getAvailCharacters($db, $rbID);

$jViewAWChars = json_encode($viewAWChars);

header("Content-Type: application/json");
echo $jViewAWChars;
?>
