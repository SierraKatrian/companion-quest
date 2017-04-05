<?php
	
	session_start();

	require_once "DbConnect.php";
	require_once "Avatar.php";

	$db = DbConnect::getDB();
	$avatar = new Avatar($db);
	$avatar->setUserID();
	$avatar->updateDisplayed($_POST['sel']);
?>