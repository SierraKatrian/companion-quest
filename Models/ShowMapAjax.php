<?php

    session_start();

    $gameID = $_SESSION['games']['games_id'];

    require_once "DbConnect.php";
    require_once "MapsDAO.php";

    $db = DbConnect::getDB();
    $MapsDAO = new MapsDAO($db);
    $getSelectedMap = $MapsDAO->READ_SelectedMap($gameID);

    $JSONGetSelectedMap = json_encode($getSelectedMap);
    header("Content-Type: application/json");

    echo $JSONGetSelectedMap;

?>
