<?php
/**
 * Created by PhpStorm.
 * User: jessmount
 * Date: 2017-03-28
 * Time: 6:44 PM
 */

require_once 'DbConnect.php';
require_once 'PrivateMessage.php';

session_start();

$user_id = $_SESSION['user']['id'];
 $connection = DbConnect::getDB();
//$connection = $db->getDb();

$chats = new PrivateMessage();
$listChats = $chats->getChatsTwo($connection, $user_id);


//var_dump($otherUser);



$jChats = json_encode($listChats);
header("Content-Type: application/json");
echo $jChats;

//var_dump($listChats[0]['user_one']);
//var_dump($listChats[0]['user_two']);
//var_dump($listChats);

//var_dump($user_id);
//var_dump($listChats);
