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

$getCharSheet = $charClass->getCharSheet($db, 18, 3);
$getCharSheet = $charClass->getCharSheet($db, 17, 1);

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
            <p style="font-weight:bold;font-size:24px;text-align:center;">APOCALYPSE WORLD CHARACTER SHEET</p>
            <?php foreach ($getCharSheet as $char): ?>
                <p style="font-weight:bold;font-size:24px;"><?php echo 'ID: ' . $char->id . ' - ' . $char->name . ' the ' . $char->role_name; ?></p>
                <div>Eyes: <?php echo $char->eyes; ?></div>
                <div>Hair: <?php echo $char->hair; ?></div>
                <div>Gender: <?php echo $char->gender; ?></div>
                <p>BARTER</p>
                <div><?php echo $char->barter; ?></div>
                <label for="gear">GEAR</label>
                <textarea name="gear" rows="8" cols="80"><?php echo $char->added_gear; ?></textarea>
                <label for="other-moves">OTHER MOVES</label>
                <textarea name="other-moves" rows="8" cols="80"><?php echo $char->other_moves; ?></textarea>
                <label for="stat1">COOL</label>
                <input type="text" name="stat1" value="<?php echo $char->stat1; ?>">
                <label for="stat2">HARD</label>
                <input type="text" name="stat2" value="<?php echo $char->stat2; ?>">
                <label for="stat3">HOT</label>
                <input type="text" name="stat3" value="<?php echo $char->stat3; ?>">
                <label for="stat4">SHARP</label>
                <input type="text" name="stat4" value="<?php echo $char->stat4; ?>">
                <label for="stat5">WEIRD</label>
                <input type="text" name="stat5" value="<?php echo $char->stat5; ?>">

                <label for="harm">HARM</label>

                <label for="moves">MOVES</label>
                <input type="checkbox" name= value="">

            <?php endforeach; ?>


            <p style="font-weight:bold;font-size:24px;text-align:center;">DUNGEON WORLD CHARACTER SHEET</p>
            <?php foreach ($getCharSheet as $char): ?>
                <p style="font-weight:bold;font-size:24px;"><?php echo 'ID: ' . $char->id . ' - ' . $char->name . ' the ' . $char->role_name; ?></p>
                <div>Eyes: <?php echo $char->eyes; ?></div>
                <div>Hair: <?php echo $char->hair; ?></div>
                <div>Gender: <?php echo $char->gender; ?></div>
                <p>BARTER</p>
                <div><?php echo $char->barter; ?></div>
                <label for="gear">GEAR</label>
                <textarea name="gear" rows="8" cols="80"><?php echo $char->added_gear; ?></textarea>
                <label for="other-moves">OTHER MOVES</label>
                <textarea name="other-moves" rows="8" cols="80"><?php echo $char->other_moves; ?></textarea>
                <label for="stat1">COOL</label>
                <input type="text" name="stat1" value="<?php echo $char->stat1; ?>">
                <label for="stat2">HARD</label>
                <input type="text" name="stat2" value="<?php echo $char->stat2; ?>">
                <label for="stat3">HOT</label>
                <input type="text" name="stat3" value="<?php echo $char->stat3; ?>">
                <label for="stat4">SHARP</label>
                <input type="text" name="stat4" value="<?php echo $char->stat4; ?>">
                <label for="stat5">WEIRD</label>
                <input type="text" name="stat5" value="<?php echo $char->stat5; ?>">
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
