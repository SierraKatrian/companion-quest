<?php
require_once './Models/DbConnect.php';
require_once './Models/AvailCharactersDAO.php';
require_once './Models/CharacterDAO.php';

$dbClass = new DbConnect();
$db = $dbClass->getDB();

// $rbID = 1;

// $availCharClass = new AvailCharactersDAO();
// $getAWChars = $availCharClass->getAvailCharacters($db, 1);
// $getDWChars = $availCharClass->getAvailCharacters($db, 2);
$userID = 18;
$gameID = 3;
$rbID = 1;
$roleID = 3;

$charClass = new CharacterDAO();
$getAW = $charClass->getRole($db, $rbID, $roleID);
$getDW = $charClass->getRole($db, 2, 16);
$getAWMoves = $charClass->getMoves($db, 3);

$getCharSheet = $charClass->getCharSheet($db, $userID, $gameID);

$getUser = $charClass->getUser($db, $userID);
$getGame = $charClass->getGame($db, $gameID);

// var_dump($getCharSheet);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <main class="container-fluid">
            <p style="font-weight:bold;font-size:24px;text-align:center;">GAME</p>
            <?php foreach ($getGame as $game): ?>
                <p style="font-weight:bold;font-size:24px;"><?php echo $game->rb_id; ?></p>
                <div><?php echo $game->game_name; ?></div>
                <div><?php echo $game->max_players; ?></div>
            <?php endforeach; ?>
            <p style="font-weight:bold;font-size:24px;text-align:center;">USER</p>
            <?php foreach ($getUser as $user): ?>
                <p style="font-weight:bold;font-size:24px;"><?php echo $user->user_name; ?></p>
                <div><?php echo $user->f_name; ?></div>
                <div><?php echo $user->email; ?></div>
            <?php endforeach; ?>


            <p style="font-weight:bold;font-size:24px;text-align:center;">CHARACTER SHEET</p>
            <?php foreach ($getCharSheet as $char): ?>
                <p style="font-weight:bold;font-size:24px;"><?php echo 'ID: ' . $char->id . ' - ' . $char->name . ' the ' . $char->role_name; ?></p>
                <div>Eyes: <?php echo $char->eyes; ?></div>
                <div>Hair: <?php echo $char->hair; ?></div>
                <div>Gender: <?php echo $char->gender; ?></div>
                <p>BARTER</p>
                <div><?php echo $char->barter; ?></div>
            <?php endforeach; ?>


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
