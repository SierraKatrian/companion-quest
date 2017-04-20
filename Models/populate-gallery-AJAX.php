<?php

    session_start();

    $gameID = $_SESSION['games']['games_id'];

    require_once "DbConnect.php";
    require_once "MapsDAO.php";

    $db = DbConnect::getDB();
    $MapsDAO = new MapsDAO($db);
    $displayMaps = $MapsDAO->READ_Maps($gameID);

    foreach($displayMaps as $imageArray){
        echo '<button id='.$imageArray['id'].' class="col-md-3 map-thumb" type="submit" name="mapImageBtn" value="" style="background:url(data:image;base64,'.$imageArray['image'].'); background-size:cover; background-position: center center; border:none;"></button>';
    }

?>
