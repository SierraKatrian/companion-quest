<?php 
session_start();
date_default_timezone_set('America/Toronto');

require_once "DbConnect.php";
require_once "ChatDAO.php";
$now = date("Y-M-d H:i:s");
$db = DbConnect::getDB();

$userid = $_SESSION['user']['id'];

$chat = new Chat();
$chat->setChatDetail($userid, $_POST['msg']);
$chats = $chat->addChat($db, $now);

?>