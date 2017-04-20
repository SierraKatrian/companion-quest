<?php
/**
 * Created by PhpStorm.
 * User: jessmount
 * Date: 2017-04-19
 * Time: 7:46 PM
 */

require_once "superUser.php";
require_once "DbConnect.php";

$db = DbConnect::getDB();

$u = new superUser();
$allUsers = $u->getAllUsers($db);



foreach($allUsers as $user){

    echo "<tr><td>" . $user['id'] . "</td>" . "<td>" . $user['user_name'] . "</td>" .
        "<td>" . $user['f_name'] . "</td>" . "<td>" . $user['l_name'] . "</td>" . "<td>" . $user['email'] . "</td>" .
       "<td>".$user['permissions']. "</td><td><button id='".$user['id'] ."' class='delete'>Delete</button>" . " " . " " .
        "<button id='" . $user['id'] ."' class='admin'>Make Admin</button></td>" . "</tr>";



}


?>