<?php

if(isset($_POST['games_portal'])){
   $_SESSION['gamedetails'] = $_POST['games_portal'];
   $gamedetails = $_SESSION['gamedetails'];

    /*
    $gameId = $gamedetails['gameId'];
    $gameName = $gamedetails['game_name'];
    $gameLanguage = $gamedetails['lang'];
    $gamePlayerTotal = $gamedetails['max_players'];
    $gameStatus = $gamedetails['game_status'];
    $gameId = $gamedetails['id'];
    */

    print_r($gamedetails);
    }

?>
