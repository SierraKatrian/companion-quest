<?php
/**
 * Created by PhpStorm.
 * User: jessmount
 * Date: 2017-04-05
 * Time: 3:09 PM
 */

require_once 'DbConnect.php';
require_once 'PrivateMessage.php';

session_start();


$connection = DbConnect::getDB();

/*$user_one =$_SESSION['user']['id'];
$user_two = $_POST['user_two'];
$nm = $_POST ['reply'];
$timeOfPost = date("Y-m-d H:i:s");



$a = new PrivateMessage();
$userId = $a->getUserId($connection, $user_two);
$a->sendMessage($connection,$user_one, $userId[0], $nm, $timeOfPost);

var_dump($_SESSION);

*/



$author = $_SESSION['user']['id'];
$user_two = $_POST['user_two'];
$nm = $_POST ['reply'];
$timeOfPost = date("Y-m-d H:i:s");


$a = new PrivateMessage();
$userId = $a->getUserId($connection, $user_two);
$chat_id = $a->getChatId($connection, $author, $userId[0] );
$a->sendMessage($connection,$author,$nm, $timeOfPost, $chat_id[0] );

var_dump($userId[0]);