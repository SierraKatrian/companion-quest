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

$connection = DbConnect::getDB();

$username = $_POST['UserName'];
$user_id = $_SESSION['user']['id'];

$c = new PrivateMessage();
$userId = $c->getUserId($connection, $username);
$chatId = $c->getChatId($connection, $user_id, $userId['id']);
$listMsg = $c->listMsgs($connection, $chatId['id']);



$jMsg = json_encode($listMsg);
header("Content-Type: application/json");
echo $jMsg;
//echo $username;
//echo $user_id;
//var_dump($chatId);
//var_dump($listMsg);