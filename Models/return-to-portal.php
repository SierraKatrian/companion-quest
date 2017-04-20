<?php
session_start();

$userOrGM = $_SESSION['games']['permission'];

if ($userOrGM == 1) {

    header('location: ../GM-Portal.php');

} else if ($userOrGM == 2) {

    header('location: ../Player-Portal.php');

} else {

    header('location: ../game-room.php');

}

?>
