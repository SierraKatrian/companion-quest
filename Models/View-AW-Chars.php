<?php
// session_start();
// $gameDetails = $_SESSION['gameDetails'];
//
// $ruleBook = $gameDetails['rb_id'];
// $gameID = $gameDetails['id'];

require_once 'DbConnect.php';
require_once 'AvailCharactersDAO.php';

$dbClass = new DbConnect();
$db = $dbClass->getDB();

// $rbID = 2;
//
$availCharClass = new AvailCharactersDAO();
$viewAWChars = $availCharClass->getAvailCharacters($db, 1);

$jViewAWChars = json_encode($viewAWChars);
// var_dump($jViewAWChars);
header("Content-Type: application/json");
echo $jViewAWChars;
?>
