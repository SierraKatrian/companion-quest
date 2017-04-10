<?php
// mb_internal_encoding("UTF-8");

require_once 'DbConnect.php';
require_once 'AvailCharactersDAO.php';

$dbClass = new DbConnect();
$db = $dbClass->getDB();

$rbID = 1;

$availCharClass = new AvailCharactersDAO();
$viewAWChars = $availCharClass->getAvailCharacters($db, $rbID);
htmlspecialchars($viewAWChars);
$jViewAWChars = json_encode($viewAWChars);

var_dump($jViewAWChars);

header("Content-Type: text/plain");
echo $jViewAWChars;
?>
