<?php
require_once './Models/DbConnect.php';
require_once './Models/AvailCharactersDAO.php';
require_once './Models/CharacterDAO.php';

$dbClass = new DbConnect();
$db = $dbClass->getDB();

// $rbID = 1;

$availCharClass = new AvailCharactersDAO();
// $getAWChars = $availCharClass->getAvailCharacters($db, 1);
// $getDWChars = $availCharClass->getAvailCharacters($db, 2);
$userID = 18;
$gameID = 3;
$rbID = 1;
$roleID = 3;

$charClass = new CharacterDAO();
$getAW = $charClass->getRole($db, 1, 1);
$getDW = $charClass->getRole($db, 2, 16);
$getAWMoves = $charClass->getMoves($db, 3);

// GET PLAYABLE CHARACTERS SELECTED CHARACTER SHEET
$getAWSheet = $charClass->getCharSheet($db, 18, 3);
$getDWSheet = $charClass->getCharSheet($db, 17, 1);

$getUser = $charClass->getUser($db, $userID);
$getGame = $charClass->getGame($db, $gameID);

// GET PLAYABLE CHARACTERS FOR SPECIFIC GAME
$playableChars = $availCharClass->getAllChars($db, $gameID)

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

        <!-- GET PLAYABLE CHARACTERS FOR SPECIFIC GAME -->
        <form name="selectChar" class="" action="" method="post">
            <div class="playableChars">
                <?php foreach ($playableChars as $chars): ?>
                    <div class="col-sm-2 col-xs-3 character-thumb-container">
                        <label for="<?php echo $chars->role_name ?>">
                            <input id="<?php echo $chars->role_name ?>" class="character-chk" type="radio" name="availChar" value="<?php echo $chars->role_id ?>" />
                            <img class="character-img" src="Images/apocalypse-world-characters/<?php echo $chars->picture ?>" /> <p><?php echo $chars->role_name . '(' . $chars->role_id . ')' ?></p>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
            <div id="charSheet">

            </div>
        </form>


            <p style="font-weight:bold;font-size:24px;text-align:center;">APOCALYPSE WORLD CHARACTER SHEET</p>
            <?php foreach ($getAWSheet as $char): ?>
                <p style="font-weight:bold;font-size:24px;"><?php echo 'ID: ' . $char->roles_id . ' - ' . $char->name . ' the ' . $char->role_name ?></p>
                <p><?php echo $char->bio; ?></p>
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

                <h3>HARM</h3>
                <div class="">
                    <input type="radio" name="harm" value="1" <?php echo ($char->total_harm == 1) ? "checked" : "" ; ?>>
                    <label for="harm">First Hit</label>
                </div>

                <div class="">
                    <input type="radio" name="harm" value="2" <?php echo ($char->total_harm == 2) ? "checked" : "" ; ?>>
                    <label for="harm">Second Hit</label>
                </div>

                <div class="">
                    <input type="radio" name="harm" value="3" <?php echo ($char->total_harm == 3) ? "checked" : "" ; ?>>
                    <label for="harm">Third Hit</label>
                </div>

                <div class="">
                    <input type="radio" name="harm" value="4" <?php echo ($char->total_harm == 4) ? "checked" : "" ; ?>>
                    <label for="harm">Fourth Hit</label>
                </div>

                <div class="">
                    <input type="radio" name="harm" value="5" <?php echo ($char->total_harm == 5) ? "checked" : "" ; ?>>
                    <label for="harm">Fifth Hit</label>
                </div>

                <div class="">
                    <input type="radio" name="harm" value="6" <?php echo ($char->total_harm == 6) ? "checked" : "" ; ?>>
                    <label for="harm">Sixth Hit</label>
                </div>

                <div class="">
                    <input type="radio" name="stabilized" value="stabilized" <?php echo ($char->stabilized == 1) ? "checked" : "" ; ?>>
                    <label for="stabilized">Stabalized?</label>
                </div>

                <div class="">
                    <input type="radio" name="minusHard" value="minusHard" <?php echo ($char->minus_hard == 1) ? "checked" : "" ; ?>>
                    <label for="minusHard">Come back with -1hard</label>
                </div>

                <div class="">
                    <input type="radio" name="plusWeird" value="plusWeird" <?php echo ($char->plus_weird == 1) ? "checked" : "" ; ?>>
                    <label for="plusWeird">Come back with +1weird (max+3)</label>
                </div>

                <div class="">
                    <input type="radio" name="newPlaybook" value="newPlaybook" <?php echo ($char->new_role == 1) ? "checked" : "" ; ?>>
                    <label for="newPlaybook">Change to a new playbook</label>
                </div>

                <div class="">
                    <input type="radio" name="die" value="die" <?php echo ($char->die == 1) ? "checked" : "" ; ?>>
                    <label for="die">Die</label>
                </div>


                <label for="moves">MOVES</label>
                <?php echo $char->id; ?>
                <?php var_dump(count($char->id)) ?>
            <?php endforeach; ?>


            <p style="font-weight:bold;font-size:24px;text-align:center;">DUNGEON WORLD CHARACTER SHEET</p>
            <?php foreach ($getDWSheet as $char): ?>
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
