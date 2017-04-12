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

$user_one = $_SESSION['user']['id'];
$connection = DbConnect::getDB();

$user_two = $_POST['to']; //grab from Ajax
$text = $_POST['message']; //grab from Ajax
$timeSent= date("Y-m-d H:i:s");
$m = new PrivateMessage();
$newMessage = $m->checkChat($connection, $user_one, $user_two);




if($newMessage == 0) {
    $n= new PrivateMessage();
    $insert = $n->insertChat($connection, $user_one, $user_two);
    $reply = $n->sendMessage($connection,$user_one, $user_two, $text, $timeSent);
    echo "inserted!";
}else{
    $n= new PrivateMessage();
    $r = new PrivateMessage();
    $reply = $r->sendMessage($connection,$user_one, $user_two, $text, $timeSent);

    echo "chat exists";
}
