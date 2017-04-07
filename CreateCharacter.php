<?php

require_once './Models/DbConnect.php';
require_once './Models/AvailCharactersDAO.php';

$dbClass = new DbConnect();
$db = $dbClass->getDB();

$rbID = 1;

$availCharClass = new AvailCharactersDAO();
$getAvailChars = $availCharClass->getAvailCharacters($db, $rbID);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php foreach ($getAvailChars as $char): ?>
            <p><?php echo $char->barter; ?></p>
            <p><?php echo $char->gear; ?></p>
        <?php endforeach; ?>
    </body>
</html>
