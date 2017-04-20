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


if (isset($_POST['btn_submit'])) {

    $roleID = $_POST['roleID'];
    // $name = $_POST['name'];
    // // $hair = $_POST['hair'];
    // $face = $_POST['face'];
    // $eyes = $_POST['eyes'];
    // $body = $_POST['body'];
    // $clothes = $_POST['clothes'];
    // $gender = $_POST['gender'];

    $stat1 = $_POST['stat1'];
    $stat2 = $_POST['stat2'];
    $stat3 = $_POST['stat3'];
    $stat4 = $_POST['stat4'];
    $stat5 = $_POST['stat5'];
    //
    // $harm = $_POST['harm'];
    // $stabilized = $_POST['stabilized'];
    // $minusHard = $_POST['minusHard'];
    // $plusWeird = $_POST['plusWeird'];
    // $newRole = $_POST['newPlaybook'];
    // $die = $_POST['die'];

    // $selectedGear = $_POST['selected-gear'];
    // $selectedMoves = $_POST['selected-moves'];
    // $alignment = $_POST['alignment'];

    require_once 'DbConnect.php';
    require_once 'CharacterDAO.php';

    $dbClass = new DbConnect();
    $db = $dbClass->getDB();
    $charClass = new CharacterDAO();

    // $updateChar = $charClass->updatePlayerChar($db, $userID, $roleID, $gameID, $name, $face, $eyes, $body, $clothes, $gender, $selectedGear, $selectedMoves);

    $updateStats = $charClass->updateCharStats($db, $roleID, $stat1, $stat2, $stat3, $stat4, $stat5);

var_dump($_POST);
// var_dump($updateChar);
var_dump($updateStats);
var_dump($userID);
var_dump($gameID);
var_dump($roleID);

    // header ('location: ../Player-Portal.php');

} else {

    echo "Something went wrong";

}

?>
