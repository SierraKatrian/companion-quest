<?php
	
	session_start();

	require_once "DbConnect.php";
	require_once "Avatar.php";

	$db = DbConnect::getDB();
	$avatar = new Avatar($db);
	$avatar->setUserID();


	$target_path = "../Images/avatar/".$_FILES['avatarForm__upload']['name'];
	$imgurl = "Images/avatar/".$_FILES['avatarForm__upload']['name'];

	if(move_uploaded_file($_FILES['avatarForm__upload']['tmp_name'], $target_path)) {
		//set the url into the object
		$avatar->setUrl($imgurl);
		//insert a line into the database
		$avatar->insertAvatar();
	}

?>