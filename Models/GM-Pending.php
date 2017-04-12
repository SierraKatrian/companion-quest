<?php
/**
 * Created by PhpStorm.
 * User: jessmount
 * Date: 2017-04-11
 * Time: 8:02 PM
 */

require_once 'DbConnect.php';
require_once 'playerPermissions.php';

$connection = DbConnect::getDB();
$gameName = $_POST['gameName'];

$p = new playerPermissions();
$gameID = $p->getGameName($connection, $gameName);

$list= $p->listPendingPlayers($connection, $gameID[0]);

$jList = json_encode($list);
header("Content-Type: application/json");
echo $jList;