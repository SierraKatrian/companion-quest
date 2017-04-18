<?php

    $getCharSheet = $charClass->getCharSheet($db, $userID, $gameID);

    // $charDetails = $_SESSION['charDetails'];
    // $charID = $charDetails['id'];
    // $roleID = $charDetails['roles_id'];

    echo '<br/>Rulebook: ' . $ruleBook;
    echo '<br/>Game ID: ' . $gameID;
    echo '<br/>User ID: ' . $userID . '<br/>';

    var_dump($getCharSheet);

?>

<!--CHARACTER LIST-->
<h2>Choose Your Character</h2>
<div class="panel panel-default character-panel-player">
    <div class="panel-body">
        <form id="selectPlayerChar" name="selectPlayerChar" action="" method="post">
            <div class="row">
                <!-- <div class="col-sm-6"> -->
                    <div id="chooseChar">

                    </div>
                <!-- </div>
                <div class="col-sm-6">
                    <div id="charBio">

                    </div>
                </div> -->
            </div>
            <button id="btn_select_char" class="btn btn-primary" type="button" name="btn_select_char">Select Character</button>
        </form>
    </div>
</div>

<div class="panel panel-default character-panel-player">
    <div class="panel-body">
        <?php if ($ruleBook == 1) : ?>
            <!-- APOCALYPSE WORLD CHARACTER SHEET -->
            <h2 class="csTitle">APOCALYPSE WORLD CHARACTER SHEET</h2>
            <form class="" name="btn_submit_char" action="Models/Submit-Player-Char.php" method="post">
            <?php foreach ($getCharSheet as $char): ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel panel-default char-sheet-panel">
                            <div class="row">

                                <div class="col-sm-6">
                                    <h3><label for="name">Name: </label><input type="text" name="name" value="<?php echo $char->name ?>"></h3>
                                    <input type="hiddent" name="role_id" value="<?php echo $char->role_id ?>">
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

                                <div class="col-sm-6">
                                        <h3 class="csTitle">The <?php echo $char->role_name ?></h3>
                                        <p><?php echo $char->bio; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-default char-sheet-panel">
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
                    </div>

                    <div class="panel panel-default char-sheet-panel">
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

                        <!-- <div class="">
                            <input type="radio" name="newPlaybook" value="newPlaybook" <?php //echo ($char->new_role == 1) ? "checked" : "" ; ?>>
                            <label for="newPlaybook">Change to a new playbook</label>
                        </div> -->

                        <div class="">
                            <input type="radio" name="die" value="die" <?php echo ($char->die == 1) ? "checked" : "" ; ?>>
                            <label for="die">Die</label>
                        </div>
                    </div>

                    <div class="panel panel-default char-sheet-panel">
                        <div class="gear">
                            <h3 class="csTitle">Gear</h3>
                            <textarea class="csTextArea" name="gear" rows="8" cols="80"><?php echo $char->added_gear; ?></textarea>
                        </div>
                    </div>

                    <div class="panel panel-default char-sheet-panel">
                        <h3 class="csTitle"><?php echo $char->role_name; ?> Moves</h3>
                        <?php foreach ($getAWMoves as $moves): ?>
                            <p><?php echo $moves->move_name ?></p>
                            <p><?php echo $moves->move_desc ?></p>
                        <?php endforeach; ?>
                    </div>

                    <div class="panel panel-default char-sheet-panel">
                        <h3 class="csTitle">Selected Moves</h3>
                        <textarea class="csTextArea" name="other-moves" rows="8" cols="80"><?php echo $char->selected_moves; ?></textarea>
                    </div>

                    <div class="panel panel-default char-sheet-panel">
                        <h3>BARTER</h3>
                        <div><?php echo $char->barter; ?></div>
                    </div>

                </div>

                <div class="col-sm-6">
                    <div class="panel panel-default char-sheet-panel">
                        <h3 class="csTitle">Creating a <?php echo $char->role_name ?></h3>
                        <h5 class="csTitle">Moves</h5>
                        <p><?php echo $char->moves ?></p>

                        <h5 class="csTitle">Stats</h5>
                        <p><?php echo $char->stats ?></p>

                        <h5 class="csTitle">Gear</h5>
                        <p><?php echo $char->gear ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
            </form>
        </div>

        <?php else : ?>

            <!-- DUNGEON WORLD CHARACTER SHEET -->
            <h2 class="csTitle">DUNGEON WORLD CHARACTER SHEET</h2>
            <?php foreach ($getCharSheet as $char): ?>
                <p><?php echo $char->name . ' the ' . $char->role_name; ?></p>

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

        <?php endif; ?>
    </div>
</div>
