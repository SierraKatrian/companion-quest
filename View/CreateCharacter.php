<?php
require_once 'Header.php';
require_once '../Models/DbConnect.php';
require_once '../Models/AvailCharactersDAO.php';
require_once '../Models/CharacterDAO.php';

$dbClass = new DbConnect();
$db = $dbClass->getDB();

// $rbID = 1;

// $availCharClass = new AvailCharactersDAO();
// $getAWChars = $availCharClass->getAvailCharacters($db, 1);
// $getDWChars = $availCharClass->getAvailCharacters($db, 2);

$charClass = new CharacterDAO();
$getAW = $charClass->getRole($db, 1, 3);
$getDW = $charClass->getRole($db, 2, 16);

$getAWMoves = $charClass->getMoves($db, 3)

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <main class="container-fluid">
            <p style="font-weight:bold;font-size:24px;text-align:center;">APOCALYPSE WORLD</p>
            <?php foreach ($getAW as $char): ?>
                <p style="font-weight:bold;font-size:24px;"><?php echo $char->role_name; ?></p>
                <p>BARTER</p>
                <div><?php echo $char->barter; ?></div>
                <p>STARTING GEAR</p>
                <div><?php echo $char->gear; ?></div>
            <?php endforeach; ?>
            <?php foreach ($getAWMoves as $move): ?>
                <p style="font-weight:bold;font-size:18px;"><?php echo $move->move_name; ?></p>
                <div><?php echo $move->move_desc; ?></div>
                <div><?php echo $move->selected; ?></div>
            <?php endforeach; ?>

            <p style="margin-top:30px;font-weight:bold;font-size:24px;text-align:center;">DUNGEON WORLD</p>
            <?php foreach ($getDW as $char): ?>
                <div style="font-weight:bold;font-size:24px;"><?php echo $char->role_name; ?></div>
                <p>STARTING GEAR</p>
                <div><?php echo $char->gear; ?></div>
            <?php endforeach; ?>
        </main>
    </body>
</html>
