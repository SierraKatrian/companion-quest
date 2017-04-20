<?php
/**
 * Created by PhpStorm.
 * User: jessmount
 * Date: 2017-04-18
 * Time: 8:00 PM
 */

require_once 'Models/DbConnect.php';
require_once 'Models/playerPermissions.php';

$db = DbConnect::getDB();

$userId =  $_SESSION['user']['id'];

$list = new playerPermissions();


/*$roomId = $gameClass->getGameRoomid($db, $userId);


foreach($roomId as $rvalue){

    $status = $rvalue->player_status;

    if($status == "1"){

        echo "";
    } else {

        switch ($status) {


            case '2':
                $img = '<img class="access-colours" src="Images/status-colours/access-denied.svg" alt="access denied" />';
                break;


            case '4':
                $img = '<img class="access-colours" src="Images/status-colours/invite-pending.svg" alt="invite-pending" />'
                    . " " . '<div class="dropdown"><button type="button" class="btn btn-link btn-dropdown-options dropdown-toggle" data-toggle="dropdown">
                                 Options<span class="caret" data-toggle="dropdown"></span></button><ul class="dropdown-menu">
                            <li class=""><a href="#" id = "' . $rvalue->id . '" class="drop-down-options-list accept">accept</a></li>
                            <li class=""><a href="#" id = "' . $rvalue->id . '" class="drop-down-options-list decline">decline</a></li></ul></div>';
                break;

            case '3':
                $img = '<img class="access-colours" src="Images/status-colours/request-pending.svg" alt="request-pending" />';
                break;

            default:
                $img = "";
        }


        $usergames = $gameClass->getAllUserGames($db, $rvalue->id);
        var_dump($usergames);
        foreach ($usergames as $value) {


            echo "<tr id='" . $rvalue->id . "'>" . "<td>" . $img . "</td>" . "<td>" . $value->game_name . "</td>" .
                "<td>" . $value->user_name . "</td>" . "<td>" . $value->lang . "</td>" . "<td>" . $value->max_players . "</td>" .
                "<td>" . $value->name . "</td>" . "</tr>";
        }
    }
}

*/


$requestList = $list->playerInvites($db, $userId);


foreach ($requestList as $request){

    switch($request['player_status']){


        case 2:
            $img = '<img class="access-colours" src="Images/status-colours/access-denied.svg" alt="access denied" />';
            break;


        case 4:
            $img = '<img class="access-colours" src="Images/status-colours/invite-pending.svg" alt="invite-pending" />'
                    . " " .'<div class="dropdown"><button type="button" class="btn btn-link btn-dropdown-options dropdown-toggle" data-toggle="dropdown">
                             Options<span class="caret" data-toggle="dropdown"></span></button><ul class="dropdown-menu">
                        <li class=""><a href="#" id = "'. $request['games_id'] .'" class="drop-down-options-list accept">accept</a></li>
                        <li class=""><a href="#" id = "'. $request['games_id'] .'" class="drop-down-options-list decline">decline</a></li></ul></div>';
            break;


        case 3:
            $img = '<img class="access-colours" src="Images/status-colours/request-pending.svg" alt="request-pending" />';
            break;
    }

echo "<tr><td>" . $img . "</td>" . "<td>" . $request['game_name'] . "</td>" ."<td>" . $request['lang'] . "</td>" ."<td>" . $request['max_players']. "</td>" ."<td>" . $request['name'] . "</td></tr>";
}

?>