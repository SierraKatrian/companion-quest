<?php 
session_start();

require_once "DbConnect.php";
require_once "ChatDAO.php";

$db = DbConnect::getDB();

$userid = $_SESSION['user']['id'];
$chat = new Chat();
$chat->setUserId($userid);
$chats = $chat->getChat($db, $_SESSION['game']);

$jchats = json_encode($chats);
header("Content-Type: application/json");

echo $jchats;
?>