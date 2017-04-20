<?php

    session_start();

    $gameDetails = $_SESSION['gameDetails'];
    $gameID = $gameDetails['id'];

    require_once "DbConnect.php";
    require_once "MapsDAO.php";

    $db = DbConnect::getDB();
    $MapsDAO = new MapsDAO($db);
    $MapsDAO->DELETE_SelectedMap($gameID);

?>
