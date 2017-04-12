<?php
/**
 * Created by PhpStorm.
 * User: jessmount
 * Date: 2017-04-12
 * Time: 11:01 AM
 */

session_start();

require_once 'DbConnect.php';
require_once 'playerPermissions.php';

$connection = DbConnect::getDB();
$gameId = $_POST['game_id'];
$newGmId = $_POST['user_id'];

$currentGM = $_SESSION['user']['id'];

$gm = new playerPermissions();
$gm->changePermissions($connection, $currentGM, $newGmId, $gameId );

echo "permissions updated";





