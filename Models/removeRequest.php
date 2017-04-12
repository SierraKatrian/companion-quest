<?php
/**
 * Created by PhpStorm.
 * User: jessmount
 * Date: 2017-04-11
 * Time: 9:37 PM
 */

require_once 'DbConnect.php';
require_once 'playerPermissions.php';

$connection = DbConnect::getDB();
$gameId = $_POST['game_id'];
$userId = $_POST['user_id'];

$a = new playerPermissions();
$a->removePlayer($connection, $userId, $gameId);