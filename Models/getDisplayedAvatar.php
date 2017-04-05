<?php
session_start();

require_once "DbConnect.php";
require_once "Avatar.php";

$db = DbConnect::getDB();
$avatar = new Avatar($db);
$avatar->setUserID();
$icons = $avatar->getUserIcon();

$jicons = json_encode($icons);
header("Content-Type: application/json");

echo $jicons;
?>