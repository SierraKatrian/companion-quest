<?php
/**
 * Created by PhpStorm.
 * User: jessmount
 * Date: 2017-04-19
 * Time: 9:09 PM
 */

require_once 'DbConnect.php';
require_once 'superUser.php';

$connection = DbConnect::getDB();

$userId = $_POST['user_id'];



$u = new superUser();
$u->deleteUser($connection, $userId);



