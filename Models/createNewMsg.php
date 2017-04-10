<?php
/**
 * Created by PhpStorm.
 * User: jessmount
 * Date: 2017-04-07
 * Time: 3:14 PM
 */

require_once 'DbConnect.php';
require_once 'PrivateMessage.php';

session_start();

$author = $_SESSION['user']['id'];
$connection = DbConnect::getDB();

$user_two = $_POST['to']; //grab from Ajax
$text = $_POST['message']; //grab from Ajax
$timeSent= date("Y-m-d H:i:s");
$m = new PrivateMessage();
$newMessage = $m->checkChat($connection, $author, $user_two);




if($newMessage == 0) {
    $n= new PrivateMessage();
    $insert = $n->insertChat($connection, $author, $user_two);
    $chat_id = $n->getChatId($connection, $author, $user_two );
    $reply = $n->sendMessage($connection,$author,$text, $timeSent, $chat_id[0]);

    echo "chat inserted";

}else{
    $n= new PrivateMessage();
    $r = new PrivateMessage();
    $chat_id = $n->getChatId($connection, $author, $user_two );
    $reply = $r->sendMessage($connection,$author, $text, $timeSent, $chat_id[0]);

    echo "chat exists";
}

//$connection,$author,$nm, $timeOfPost, $chat_id[0]

//$db,$author, $reply, $textTime, $chat_id