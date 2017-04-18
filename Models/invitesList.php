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
$gameId =  $_SESSION['gameDetails']['id'];

$list = new playerPermissions();
$playerList = $list->getAllGamePlayers($db, $userId, $gameId);


foreach($playerList as $player) {

    switch ($player['permission']) {
        case "1": $img = '<img class="access-colours" src="Images/status-colours/access-granted.svg" alt="access granted"/><span>Active</span>';
        break;

        case "2": $img = '<img class="access-colours" src="Images/status-colours/gm.svg" alt="access granted"/><span>GM</span>';
        break;
    }

    echo "<tr id='" . $player['games_id'] . "'>" . "<td>" . $img . "</td>" . "<td>" . $player['user_name'] .
        "</td>" . "<td>" . $player['name'] . "</td>" . "<td>" . $player['role_name'] . "</td>";

}
        ?>
