<?php
require_once './Models/DbConnect.php';
// require_once './Models/AvailCharactersDAO.php';
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

    $getAWSheet = $charClass->getCharSheet($db, 18, 3);
    $getAWMoves = $charClass->getRoleMoves($db, 3);
    $getDWSheet = $charClass->getCharSheet($db, 17, 1);


//
// $getAW = $charClass->getRole($db, 1, 1);
// $getDW = $charClass->getRole($db, 2, 16);


$getUser = $charClass->getUser($db, $userID);
$getGame = $charClass->getGame($db, $gameID);

// var_dump($getDWSheet);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <main class="container-fluid">

            <!-- APOCALYPSE WORLD CHARACTER SHEET -->
            <h2 class="csTitle">APOCALYPSE WORLD CHARACTER SHEET</h2>
            <?php foreach ($getAWSheet as $char): ?>
                <div class="row">
                    <div class="col-xs-12">

                        <h3 class="csTitle">The <?php echo $char->role_name ?></h3>
                        <p><?php echo $char->bio; ?></p>
                        <h3><label for="name">Name: </label><input type="text" name="name" value="<?php echo $char->name ?>"></h3>
                        <h3 class="csTitle">Look</h3>
                        <div class="gender">
                            <label for="gender">Gender: </label><input type="text" name="gender" value="<?php echo $char->gender ?>">
                        </div>
                        <div class="clothes">
                            <label for="clothes">Clothes: </label><input type="text" name="clothes" value="<?php echo $char->clothes ?>">
                        </div>
                        <div class="face">
                            <label for="face">Face: </label><input type="text" name="face" value="<?php echo $char->face ?>">
                        </div>
                        <div class="eyes">
                            <label for="eyes">Eyes: </label><input type="text" name="eyes" value="<?php echo $char->eyes ?>">
                        </div>
                        <div class="hair">
                            <label for="hair">Hair: </label><input type="text" name="hair" value="<?php echo $char->hair ?>">
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">

                        <h3 class="csTitle">Stats</h3>
                        <div class="cool">
                            <label for="stat1">COOL</label>
                            <input type="text" name="stat1" value="<?php echo $char->stat1; ?>">
                        </div>
                        <div class="hard">
                            <label for="stat2">HARD</label>
                            <input type="text" name="stat2" value="<?php echo $char->stat2; ?>">
                        </div>
                        <div class="hot">
                            <label for="stat3">HOT</label>
                            <input type="text" name="stat3" value="<?php echo $char->stat3; ?>">
                        </div>
                        <div class="sharp">
                            <label for="stat4">SHARP</label>
                            <input type="text" name="stat4" value="<?php echo $char->stat4; ?>">
                        </div>
                        <div class="weird">
                            <label for="stat5">WEIRD</label>
                            <input type="text" name="stat5" value="<?php echo $char->stat5; ?>">
                        </div>

                        <h3 class="csTitle">Harm</h3>
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

                        <div class="gear">
                            <h3 class="csTitle">Gear</h3>
                            <textarea class="csTextArea" name="gear" rows="8" cols="80"><?php echo $char->added_gear; ?></textarea>
                        </div>

                        <h3 class="csTitle"><?php echo $char->role_name; ?> Moves</h3>
                        <?php foreach ($getAWMoves as $moves): ?>
                            <p style="font-weight:bold;"><?php echo $moves->move_name ?></p>
                            <p><?php echo $moves->move_desc ?></p>
                        <?php endforeach; ?>

                        <h3 class="csTitle">Selected Moves</h3>
                        <textarea class="csTextArea" name="other-moves" rows="8" cols="80"><?php echo $char->selected_moves; ?></textarea>

                        <h3>BARTER</h3>
                        <div><?php echo $char->barter; ?></div>

                    </div>


                    <div class="col-md-6">
                        <h3 class="csTitle">Creating a <?php echo $char->role_name ?></h3>
                        <h5 class="csTitle">Moves</h5>
                        <p><?php echo $char->moves ?></p>

                        <h5 class="csTitle">Stats</h5>
                        <p><?php echo $char->stats ?></p>

                        <h5 class="csTitle">Gear</h5>
                        <p><?php echo $char->gear ?></p>
                    </div>
                <?php endforeach; ?>
            </div>


            <!-- DUNGEON WORLD CHARACTER SHEET -->

            <p style="font-weight:bold;font-size:24px;text-align:center;">DUNGEON WORLD CHARACTER SHEET</p>
            <?php foreach ($getDWSheet as $char): ?>
                <p style="font-weight:bold;font-size:24px;"><?php echo $char->name . ' the ' . $char->role_name; ?></p>

                <label for="eyes">Eyes:</label>
                <input type="text" name="eyes" value="<?php echo $char->eyes; ?>">

                <label for="hair">Hair:</label>
                <input type="text" name="hair" value="<?php echo $char->hair; ?>">

                <label for="gender">Gender:</label>
                <input type="text" name="gender" value="<?php echo $char->gender; ?>">

                <label for="alignment">Alignment</label>
                <input type="text" name="alignment" value="<?php echo $char->alignment; ?>">

                <p>BARTER</p>
                <div><?php echo $char->barter; ?></div>
                <label for="gear">GEAR</label>
                <textarea class="csTextArea" name="gear" rows="8" cols="80"><?php echo $char->added_gear; ?></textarea>

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

        </main>
    </body>
</html>
