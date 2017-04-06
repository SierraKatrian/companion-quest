<?php

require_once 'DbConnect.php';
require_once 'AvailCharactersDAO.php';

$dbClass = new DbConnect();
$db = $dbClass->getDB();

$rbID = 1;
$gameID = 1;
$availCharClass = new AvailCharactersDAO();
$viewAvailChars = $availCharClass->getAvailCharacters($db, $rbID);


$jAvailChars = json_encode($viewAvailChars);

header("Content-Type: application/json");
echo $jAvailChars;

?>
