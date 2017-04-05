<?php
session_start();

require_once "DbConnect.php";
require_once "Avatar.php";

$db = DbConnect::getDB();
$avatar = new Avatar($db);
$avatar->setUserID();
$avatars = $avatar->getAvatar();

$javatars = json_encode($avatars);
header("Content-Type: application/json");

echo $javatars;
?>