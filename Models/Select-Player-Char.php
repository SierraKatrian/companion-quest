<?php
session_start();

//User details
$userDetails = $_SESSION['user'];

$userID = $userDetails['id'];
$fname = $userDetails['f_name'];
$lname = $userDetails['l_name'];
$username = $userDetails['user_name'];
$email = $userDetails['email'];
$password = $userDetails['password'];

//Game details
$gameDetails = $_SESSION['gameDetails'];

$gameID = $gameDetails['id'];
$ruleBook = $gameDetails['rb_id'];
$gameName = $gameDetails['game_name'];
$gameLanguage = $gameDetails['lang'];
$gamePlayerTotal = $gameDetails['max_players'];
$gameStatus = $gameDetails['game_status'];

require_once 'DbConnect.php';
require_once 'CharacterDAO.php';

$dbClass = new DbConnect();
$db = $dbClass->getDB();

$charClass = new CharacterDAO();

$getPlayerChars = $charClass->getCharacter($db, $userID, $gameID);

var_dump($getPlayerChars);

// $getPlayerChars = $_SESSION['chars'];

// $_SESSION['character'] = $getPlayerChars;
//
// $charID = $getPlayerChars['user_id'];

// var_dump($charID);

    $selectedChar = $_POST['radioValue'];
    $setPlayerChar = $charClass->setPlayerChar($db, $userID, $selectedChar, $gameID);
    $disableSelectedChars = $charClass->disableSelectedChar($db, $selectedChar, $gameID);

    // $jDisSelChars = json_encode($disableSelectedChars);
    // $jSetPlayerChar = json_encode($setPlayerChar);

    // header("Content-Type: application/json");
    // echo $jDisSelChars;
    // echo $jSetPlayerChar;
// }
?>
