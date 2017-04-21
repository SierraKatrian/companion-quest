<?php
/**
 * Created by PhpStorm.
 * User: jessmount
 * Date: 2017-04-17
 * Time: 5:15 PM
 */

require_once 'Models/DbConnect.php';
require_once 'Models/playerPermissions.php';

$db = DbConnect::getDB();

$userId =  $_SESSION['user']['id'];
$gameID = $_SESSION['games']['games_id'];

$list = new playerPermissions();
$playerList = $list->listActivePlayers($db,$gameID);


foreach($playerList as $player) {

    switch ($player['permission']) {
        case 2: $img = '<img class="access-colours" src="Images/status-colours/access-granted.svg" alt="access granted"/>';
        break;

        case 1: $img = '<img class="access-colours" src="Images/status-colours/gm.svg" alt="access granted"/>';
        break;
    }

    echo "<tr id='" . $player['games_id'] . "'>" . "<td>" . $img . "</td>" . "<td>" . $player['user_name'] .
        "</td>" . "<td>" . $player['name'] . "</td>" . "<td>" . $player['role_name'] . "</td>";

}

?>
