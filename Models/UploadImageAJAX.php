<?php

    session_start();

    $gameDetails = $_SESSION['gameDetails'];
    $gameID = $gameDetails['id'];

    require_once "DbConnect.php";
    require_once "MapsDAO.php";

    $db = DbConnect::getDB();
    $MapsDAO = new MapsDAO($db);

    if(isset($_FILES['mapsForm__upload']['type'])){

        //getimagesize will return dimensions of image + file type in a string for use inside an HTML img tag
        //$_FILES is an associative array of files uploaded to current script via $_POST
        //['image'] is the name of the input and ['tmp_name'] is a temporary filename for the uploaded file on the server
        if(getimagesize($_FILES['mapsForm__upload']['tmp_name'])){

            //addslashes will add backslashes to escape characters in simplexml_load_string
            $mapImage = addslashes($_FILES['mapsForm__upload']['tmp_name']);
            $mapName = addslashes($_FILES['mapsForm__upload']['name']);
            //file_get_contents reads file into a string
            $mapImage = file_get_contents($mapImage);
            //base64_encode encodes image data into binary data
            $mapImage = base64_encode($mapImage);
            //save image to database
            $saveMap = $MapsDAO->CREATE_Map($gameID, $mapName, $mapImage);

        }

    }//end of isset

?>
