<?php

  	session_start();

  	require_once "DbConnect.php";
  	require_once "MapsDAO.php";

  	$db = DbConnect::getDB();
  	$MapsDAO = new MapsDAO($db);
  	$MapsDAO->READ_SelectedMap($gameID);

    $jmap = json_encode($MapsDAO);
    header("Content-Type: application/json");

    echo $jmap;

?>
