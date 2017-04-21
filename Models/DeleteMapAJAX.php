<?php

    session_start();

    $gameID = $_SESSION['games']['games_id'];

    require_once "DbConnect.php";
    require_once "MapsDAO.php";

    $db = DbConnect::getDB();
    $MapsDAO = new MapsDAO($db);
    $MapsDAO->DELETE_SelectedMap($gameID);

?>
