<?php
	
	session_start();

	require_once "DbConnect.php";
	require_once "Avatar.php";

	$db = DbConnect::getDB();
	$avatar = new Avatar($db);
	$avatar->setUserID();
	//create error messages and acceptable file types
	$confirm = "";
	$acceptable = array(
		'image/jpeg',
        'image/jpg',
        'image/gif',
        'image/png');

	//creating a unique file name by inserting username in front of the image
	$target_path = "../Images/avatar/".$_SESSION['user']['user_name'].$_FILES['avatarForm__upload']['name'];
	$imgurl = "Images/avatar/".$_SESSION['user']['user_name'].$_FILES['avatarForm__upload']['name'];

	//start validation

	//checking file size bigger than 2mb
	if($_FILES['avatarForm__upload']['size'] > 2000000) {
		$confirm = "Image size exceeded 2MB! Please choose image less than 2MB";
	}

	//checking file type 
	else if(!in_array($_FILES['avatarForm__upload']['type'], $acceptable)) { 
		$confirm = "Image type has to be either jpg or png";
	}

	else if(move_uploaded_file($_FILES['avatarForm__upload']['tmp_name'], $target_path)) {
		//set the url into the object
		$avatar->setUrl($imgurl);
		//insert a line into the database
		$avatar->insertAvatar();

		$confirm = "The file ".$_FILES['avatarForm__upload']['name']." has been uploaded!";
		
	}
	//encoding and displaying the json result
	$jconfirm = json_encode($confirm);
	header("Content-Type: application/json");

	echo $jconfirm;
?>