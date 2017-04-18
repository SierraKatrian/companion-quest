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
$gameName = $_POST['gameName'];
$gameId = $_SESSION['gameDetails']['id'];


$p = new playerPermissions();
//$gameID = $p->getGameName($connection, $gameName);

$list= $p->listActivePlayers($connection, $gameId);

$jList = json_encode($list);
header("Content-Type: application/json");
echo $jList;

//var_dump($list);