<?php
/**
 * Created by PhpStorm.
 * User: jessmount
 * Date: 2017-04-19
 * Time: 10:17 PM
 */


require_once 'DbConnect.php';
require_once 'superUser.php';

$connection = DbConnect::getDB();

$userId = $_POST['user_id'];



$u = new superUser();
$u->changeUserPermissions($connection,$userId);

