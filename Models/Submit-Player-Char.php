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
$ruleBook = $_SESSION['games']['rb_id'];
$gameID = $_SESSION['games']['games_id'];
$gameName = $_SESSION['games']['game_name'];
$gameLanguage = $_SESSION['games']['lang'];
$gamePlayerTotal = $_SESSION['games']['max_players'];
$gameStatus = $_SESSION['games']['game_status'];

$charID = $_SESSION['characters']['id'];
$roleID = $_SESSION['characters']['role_id'];


if (isset($_POST['btn_submit'])) {

    // $roleID = $_POST['roleID'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    // $hair = $_POST['hair'];
    $face = $_POST['face'];
    $eyes = $_POST['eyes'];
    $body = $_POST['body'];
    $clothes = $_POST['clothes'];


    $stat1 = $_POST['stat1'];
    $stat2 = $_POST['stat2'];
    $stat3 = $_POST['stat3'];
    $stat4 = $_POST['stat4'];
    $stat5 = $_POST['stat5'];

    // if (isset($_POST['stabilized'])) {
    //     $stabilized = $_POST['stabilized'];
    // }
    //
    // if (isset($_POST['minusHard'])) {
    //     $minusHard = $_POST['minusHard'];
    // }
    //
    // if (isset($_POST['plusWeird'])) {
    //     $plusWeird = $_POST['plusWeird'];
    // }
    //
    // if (isset($_POST['newPlaybook'])) {
    //     $newRole = $_POST['newPlaybook'];
    // }
    //
    // if (isset($_POST['die'])) {
    //     $die = $_POST['die'];
    // }

    $harm = $_POST['harm'];

    $selectedGear = $_POST['selected-gear'];
    $selectedMoves = $_POST['selected-moves'];
    // $alignment = $_POST['alignment'];

    require_once 'DbConnect.php';
    require_once 'CharacterDAO.php';

    $dbClass = new DbConnect();
    $db = $dbClass->getDB();
    $charClass = new CharacterDAO();

    $updateChar = $charClass->updatePlayerChar($db, $userID, $roleID, $gameID, $name, $gender, $face, $eyes, $body, $clothes, $selectedGear, $selectedMoves);

    $updateStats = $charClass->updateCharStats($db, $charID, $stat1, $stat2, $stat3, $stat4, $stat5);

    $updateHarm = $charClass->updateCharHarm($db, $charID, $harm);

// 
// var_dump($_POST);
// var_dump($updateHarm);
// // var_dump($updateStats);
// var_dump($userID);
// var_dump($gameID);
// var_dump($charID);

    header('Location: ' . $_SERVER['HTTP_REFERER']);

} else {

    echo "Something went wrong";

}

?>
