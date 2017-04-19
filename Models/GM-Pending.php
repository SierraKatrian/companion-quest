<?php
/**
 * Created by PhpStorm.
 * User: jessmount
 * Date: 2017-04-11
 * Time: 8:02 PM
 */

session_start();

require_once 'DbConnect.php';
require_once 'playerPermissions.php';

$connection = DbConnect::getDB();

$gameId = $_SESSION['gameDetails']['id'];

$p = new playerPermissions();


$list= $p->listPendingPlayers($connection, $gameId);

$jList = json_encode($list);
header("Content-Type: application/json");
echo $jList;