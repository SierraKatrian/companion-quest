<?php

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

$roleID = 5;
$name = $_POST['name'];
$hair = $_POST['hair'];
$face = $_POST['face'];
$eyes = $_POST['eyes'];
$body = $_POST['body'];
$clothes = $_POST['clothes'];
$gender = $_POST['gender'];
$addedGear = $_POST['gear'];
$selectedMoves = $_POST['"other-moves'];
$alignment = $_POST['alignment'];

if (isset($_POST['btn_submit_char'])) {
    require_once 'DbConnect.php';
    require_once 'CharacterDAO.php';

    $dbClass = new DbConnect();
    $db = $dbClass->getDB();
    $charClass = new CharacterDAO();



    $charClass->submitPlayerChar($db, $userID, $roleID, $gameID, $name, $hair, $face, $eyes, $body, $clothes, $gender, $addedGear, $selectedMoves, $alignment = '');
} else {
    echo "Something went wrong";
}



?>
