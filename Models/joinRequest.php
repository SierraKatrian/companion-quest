<?php
/**
 * Created by PhpStorm.
 * User: jessmount
 * Date: 2017-04-11
 * Time: 10:38 AM
 */

require_once 'DbConnect.php';
require_once 'playerPermissions.php';

session_start();

$connection = DbConnect::getDB();

$user_id = $_SESSION['user']['id'];
$game_name = $_POST['gameName'];


$request = new playerPermissions();
$games_id = $request->getGameName($connection, $game_name);
$request->insertPending($connection, $user_id, $games_id['id']);


var_dump($games_id);