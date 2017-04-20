<?php
/**
 * Created by PhpStorm.
 * User: jessmount
 * Date: 2017-04-11
 * Time: 5:18 PM
 */

session_start();

require_once 'DbConnect.php';
require_once 'playerPermissions.php';

$connection = DbConnect::getDB();

//$gameId = $_SESSION['gameDetails']['id'];
$gameDetails = $_SESSION['gameDetails'];
$gameID = $gameDetails['id'];


$p = new playerPermissions();


$list= $p->listActivePlayers($connection, $gameID);

$jList = json_encode($list);
header("Content-Type: application/json");
echo $jList;

