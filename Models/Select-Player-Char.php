<?php

require_once 'DbConnect.php';
require_once 'CharacterDAO.php';

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
$ruleBook = $_SESSION['games']['rb_id'];
$gameID = $_SESSION['games']['games_id'];
$gameName = $_SESSION['games']['game_name'];
$gameLanguage = $_SESSION['games']['lang'];
$gamePlayerTotal = $_SESSION['games']['max_players'];
$gameStatus = $_SESSION['games']['game_status'];

$dbClass = new DbConnect();
$db = $dbClass->getDB();

$charClass = new CharacterDAO();

    $selectedChar = $_POST['availChars'];

    echo 'Role ID: ' . $selectedChar;

    $setPlayerChar = $charClass->setPlayerChar($db, $userID, $selectedChar, $gameID);

    $disableSelectedChars = $charClass->disableSelectedChar($db, $selectedChar, $gameID);

    $charDetails = $charClass->getCharacter($db, $userID, $gameID, $selectedChar);

    $_SESSION['characters'] = $charDetails;

    // var_dump($charDetails);

    // echo 'Char ID: ' . $_SESSION['characters']['id'];

    // $jDisSelChars = json_encode($disableSelectedChars);
    // $jSetPlayerChar = json_encode($setPlayerChar);

    header ('location: ../Player-Portal.php');

    // header("Content-Type: application/json");sss
    // echo $jDisSelChars;
    // echo $jSetPlayerChar;

    // var_dump($characterDetails);
// }
?>
