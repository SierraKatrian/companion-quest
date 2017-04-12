<?php
session_start();
$gameDetails = $_SESSION['gameDetails'];

$ruleBook = $gameDetails['rb_id'];
$gameID = $gameDetails['id'];

require_once 'DbConnect.php';
require_once 'AvailCharactersDAO.php';

$dbClass = new DbConnect();
$db = $dbClass->getDB();

$availCharClass = new AvailCharactersDAO();
$viewDWChars = $availCharClass->getAvailCharacters($db, $ruleBook);

$jViewDWChars = json_encode($viewDWChars);

header("Content-Type: application/json");
echo $jViewDWChars;
?>
