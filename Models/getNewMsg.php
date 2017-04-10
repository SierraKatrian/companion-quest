<?php
/**
 * Created by PhpStorm.
 * User: jessmount
 * Date: 2017-04-07
 * Time: 4:09 PM
 */


require_once 'DbConnect.php';
require_once 'PrivateMessage.php';

session_start();

$connection = DbConnect::getDB();

$user_two = $_POST['UserName'];
$user_id = $_SESSION['user']['id'];

$c = new PrivateMessage();
//$userId = $c->getUserId($connection, $username);
$chatId = $c->getChatId($connection, $user_two, $user_id);
$listMsg = $c->listMsgs($connection, $chatId['id']);



$jMsg = json_encode($listMsg);
header("Content-Type: application/json");
echo $jMsg;


