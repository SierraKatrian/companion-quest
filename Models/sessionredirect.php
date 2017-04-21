<?php
    ob_start();
    session_start() ;
    require_once 'DbConnect.php';
    require_once 'game.php';
    require_once 'query-game.php';
    require_once 'CharacterDAO.php';

    var_dump($_SESSION['user']['id']);
    var_dump($_POST['room_id']);

    $db = DbConnect::getDB();
    $game = new QueryGame();
    $charClass = new CharacterDAO();

    $gamedata = $game->getGameSession($db,$_SESSION['user']['id'],$_POST['room_id']);
    $chatroomid = $game->getChatRoomId ($db, $_POST['room_id']);
    $charDetails = $charClass->getCharacter($db, $_SESSION['user']['id'], $_POST['room_id']);

    $_SESSION['games'] = $gamedata;
    $_SESSION['chatroom'] = $chatroomid;
    $_SESSION['characters'] = $charDetails;

    var_dump($_SESSION['characters']);

    // logic for redirect
    if ($_SESSION['games']['permission'] == 1) {
        header('location: ../GM-Portal.php');
    }
    if ($_SESSION['games']['permission'] == 2) {
        header('location: ../Player-Portal.php');
    }


/*if(isset($_POST['games_portal'])){
   $_SESSION['gamedetails'] = $_POST['games_portal'];
   $gamedetails = $_SESSION['gamedetails'];


    $gameId = $gamedetails['gameId'];
    $gameName = $gamedetails['game_name'];
    $gameLanguage = $gamedetails['lang'];
    $gamePlayerTotal = $gamedetails['max_players'];
    $gameStatus = $gamedetails['game_status'];
    $gameId = $gamedetails['id'];


    print_r($gamedetails);
    }
*/
?>
