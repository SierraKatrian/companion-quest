<?php
/**
 * Created by PhpStorm.
 * User: jessmount
 * Date: 2017-04-18
 * Time: 9:20 PM
 */
session_start();

require_once 'DbConnect.php';
require_once 'playerPermissions.php';

$connection = DbConnect::getDB();
$gameId = $_POST['game_id'];
$userId = $_SESSION['user']['id'];

$a = new playerPermissions();
$a->acceptRequest($connection,$userId, $gameId);



