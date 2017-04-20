<?php

$getCharSheet = $charClass->getCharSheet($db, $charID);
$getCharMoves = $charClass->getRoleMoves($db, $roleID);

// var_dump($getCharSheet);
// var_dump($charID);
// var_dump($userID);
// var_dump($gameID);

?>

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
~~~~~~~~~~~~~~~~ CHARACTER LIST ~~~~~~~~~~~~~~
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<?php if (!isset($charID)): ?>
    <h2>Choose Your Character</h2>
    <div class="panel panel-default character-panel-player">
        <div class="panel-body">
            <form id="updatePlayerChar" name="updatePlayerChar" action="./Models/Select-Player-Char.php" method="post">
                <div class="row">
                    <div id="chooseChar">

                    </div>
                </div>
                <button id="btn_select_char" class="btn btn-primary" type="submit" name="btn_select_char">Select Character</button>
            </form>
        </div>
    </div>
<?php endif; ?>

<div class="character-panel-player">
    <?php if ($ruleBook == 1) : ?>

        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        ~~~~~~ APOCALYPSE WORLD CHARACTER SHEET ~~~~~~
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <h2 class="csTitle">APOCALYPSE WORLD CHARACTER SHEET</h2>
        <form class="" name="submit_char" action="Models/Submit-Player-Char.php" method="post">
        <?php foreach ($getCharSheet as $char): ?>

            <div class="panel panel-default char-sheet-panel">
                <div class="row">
                    <div class="col-sm-12">

                        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                        ~~~~~~~~~~~~~~~~ CHARACTER NAME ~~~~~~~~~~~~~~
                        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                        <div class="row">
                            <div class="col-xs-9">
                                <h3 class="csTitle"><label for="name">Name </label></h3>

                                <h3><input class="form-control" type="text" name="name" value="<?php echo $char->name ?>"></h3>
                                <input type="hidden" name="roleID" value="<?php echo $char->role_id ?>">
                            </div> <!-- end of column -->

                            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                            ~~~~~~~~~~~~~~~~ CHARACTER IMAGE ~~~~~~~~~~~~~
                            ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                            <div class="col-xs-3">
                                <div class="char-img">
                                    <img src="./Images/apocalypse-world-characters/<?php echo $char->picture ?>" alt="Picture of <?php echo $char->role_name ?>">
                                </div>
                            </div> <!-- end of column -->
                        </div> <!-- end of row -->

                        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                        ~~~~~~~~~~~~~~~~ CHARACTER STATS ~~~~~~~~~~~~~
                        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                        <div class="row">
                            <div class="col-sm-2 col-xs-4">
                                <h3 class="csTitle">Stats</h3>
                                <!-- <input type="text" name="" value="<?php echo $char->id; ?>"> -->
                                <div class="cool">
                                    <label for="stat1">COOL</label>
                                    <input class="form-control" type="text" name="stat1" value="<?php echo $char->stat1; ?>">
                                </div>
                                <div class="hard">
                                    <label for="stat2">HARD</label>
                                    <input class="form-control" type="text" name="stat2" value="<?php echo $char->stat2; ?>">
                                </div>
                                <div class="hot">
                                    <label for="stat3">HOT</label>
                                    <input class="form-control" type="text" name="stat3" value="<?php echo $char->stat3; ?>">
                                </div>
                                <div class="sharp">
                                    <label for="stat4">SHARP</label>
                                    <input class="form-control" type="text" name="stat4" value="<?php echo $char->stat4; ?>">
                                </div>
                                <div class="weird">
                                    <label for="stat5">WEIRD</label>
                                    <input class="form-control" type="text" name="stat5" value="<?php echo $char->stat5; ?>">
                                </div>
                            </div> <!-- end of column -->

                            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                            ~~~~~~~~~~~~~~~~ CHARACTER LOOKS ~~~~~~~~~~~~~
                            ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                            <div class="col-sm-4 col-xs-8">
                                <h3 class="csTitle">Look</h3>
                                <div class="gender">
                                    <label for="gender">Gender: </label>
                                    <input class="form-control" type="text" name="gender" value="<?php echo $char->gender ?>">
                                </div>
                                <div class="face">
                                    <label for="face">Face: </label>
                                    <input class="form-control" type="text" name="face" value="<?php echo $char->face ?>">
                                </div>
                                <div class="eyes">
                                    <label for="eyes">Eyes: </label>
                                    <input class="form-control" type="text" name="eyes" value="<?php echo $char->eyes ?>">
                                </div>
                                <div class="body">
                                    <label for="body">Body: </label>
                                    <input class="form-control" type="text" name="body" value="<?php echo $char->body ?>">
                                </div>
                                <div class="clothes">
                                    <label for="clothes">Clothes: </label>
                                        <input class="form-control" type="text" name="clothes" value="<?php echo $char->clothes ?>">
                                </div>
                            </div> <!-- end of column -->

                            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                            ~~~~~~~~~~~~~~~~ CHARACTER BIO ~~~~~~~~~~~~~~~
                            ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                            <div class="col-sm-6">
                                    <h3 class="csTitle">The <?php echo $char->role_name ?></h3>
                                    <p><?php echo $char->bio; ?></p>
                            </div> <!-- end of column -->
                        </div> <!-- end of row -->

                    </div> <!-- end of column -->
                </div> <!-- end of row -->
            </div> <!-- end of panel -->


            <div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-default char-sheet-panel">

                        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                        ~~~~~~~~~~~~~~~~ CHARACTER HARM ~~~~~~~~~~~~~
                        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="csTitle">Harm</h3>
                            </div> <!-- end of column -->

                            <div class="col-sm-6">
                                <div class="radio">
                                    <label for="harm"><input type="radio" name="harm" value="0" <?php echo ($char->total_harm == 0) ? "checked" : "" ; ?>>Unharmed</label>
                                </div>
                            </div> <!-- end of column -->
                        </div> <!-- end of row -->

                        <div class="row">
                            <div class="col-sm-6">

                                <div class="radio">
                                    <label for="harm"><input type="radio" name="harm" value="1" <?php echo ($char->total_harm == 1) ? "checked" : "" ; ?>>First Hit</label>
                                </div>
                                <div class="radio">
                                    <label for="harm"><input type="radio" name="harm" value="3" <?php echo ($char->total_harm == 3) ? "checked" : "" ; ?>>Third Hit</label>
                                </div>
                                <div class="radio">
                                    <label for="harm"><input type="radio" name="harm" value="5" <?php echo ($char->total_harm == 5) ? "checked" : "" ; ?>>Fifth Hit</label>
                                </div>

                            </div> <!-- end of column -->

                            <div class="col-sm-6">

                                <div class="radio">
                                    <label for="harm"><input type="radio" name="harm" value="2" <?php echo ($char->total_harm == 2) ? "checked" : "" ; ?>>Second Hit</label>
                                </div>
                                <div class="radio">
                                    <label for="harm"><input type="radio" name="harm" value="4" <?php echo ($char->total_harm == 4) ? "checked" : "" ; ?>>Fourth Hit</label>
                                </div>
                                <div class="radio">
                                    <label for="harm"><input type="radio" name="harm" value="6" <?php echo ($char->total_harm == 6) ? "checked" : "" ; ?>>Sixth Hit</label>
                                </div>

                            </div> <!-- end of column -->
                        </div> <!-- end of row -->

                        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                        ~~~~~~~~~~~~~~ ADDITIONAL DAMAMGE ~~~~~~~~~~~~
                        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                        <!-- <div class="radio">
                            <label for="stabilized"><input type="radio" name="stabilized" value="<?php echo $char->new_role ?>" <?php echo ($char->stabilized == 1) ? "checked" : "" ; ?>>Stabalized?</label>
                        </div>

                        <div class="radio">
                            <label for="minusHard"><input type="radio" name="minusHard" value="<?php echo $char->new_role ?>" <?php echo ($char->minus_hard == 1) ? "checked" : "" ; ?>>Come back with -1hard</label>
                        </div>

                        <div class="radio">
                            <label for="plusWeird"><input type="radio" name="plusWeird" value="<?php echo $char->plus_weird ?>" <?php echo ($char->plus_weird == 1) ? "checked" : "" ; ?>>Come back with +1weird (max+3)</label>
                        </div>

                        <div class="radio">
                            <label for="newPlaybook"><input type="radio" name="newPlaybook" value="<?php echo $char->new_role ?>" <?php echo ($char->new_role == 1) ? "checked" : "" ; ?>>Change to a new playbook</label>
                        </div>

                        <div class="radio">
                            <label for="die"><input type="radio" name="die" value="<?php echo $char->new_role ?>" <?php echo ($char->die == 1) ? "checked" : "" ; ?>>Die</label>
                        </div> -->

                    </div> <!-- end of panel -->
                </div> <!-- end of column -->

                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                ~~~~~~~~~~~~~~~~ STARTING STATS ~~~~~~~~~~~~~~
                ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <div class="col-sm-6">
                    <div class="panel panel-default char-sheet-panel">
                        <h5 class="csTitle">Choose Your Stats</h5>
                        <p><?php echo $char->stats ?></p>
                    </div>
                </div> <!-- end of column -->
            </div> <!-- end of row -->


    <div class="panel panel-default char-sheet-panel">
        <div class="row">

            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            ~~~~~~~~~~~~~~~~ CHARACTER GEAR ~~~~~~~~~~~~~~
            ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="col-sm-7">
                <div class="form-group gear">
                    <label for="selected-gear"><h3 class=" csTitle">Your Gear</h3></label>
                    <textarea class="form-control csTextArea" name="selected-gear" rows="8" cols="80"><?php echo $char->added_gear; ?></textarea>
                </div>
            </div> <!-- end of column -->


            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            ~~~~~~~~~~~~~~~~ STARTING GEAR ~~~~~~~~~~~~~~~
            ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="col-sm-5">
                <h5 class="csTitle">Starting Gear</h5>
                <p><?php echo $char->gear ?></p>
            </div>

        </div> <!-- end of row -->
    </div> <!-- end of panel -->


    <div class="panel panel-default char-sheet-panel">
        <div class="row">

            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            ~~~~~~~~~~~~~~~ CHARACTER MOVES ~~~~~~~~~~~~~~
            ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="col-sm-7">
                <div class="form-group moves">
                    <label for="selected-moves"><h3 class="csTitle">Your Moves</h3></label>
                    <textarea class="form-control csTextArea" name="selected-moves" rows="8" cols="80"><?php echo $char->selected_moves; ?></textarea>
                </div>
            </div> <!-- end of column -->

            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            ~~~~~~~~~~~~~~~~ STARTING MOVES ~~~~~~~~~~~~~~
            ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="col-sm-5">
                <h5 class="csTitle">Starting Moves</h5>
                <p><?php echo $char->moves ?></p>
            </div>
        </div> <!-- end of row -->
    </div> <!-- end of panel -->


    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default char-sheet-panel">

                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                ~~~~~~~~~~~~~~~~~~ ROLE MOVES ~~~~~~~~~~~~~~~~
                ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <h3 class="csTitle"><?php echo $char->role_name; ?> Moves</h3>
                <?php foreach ($getCharMoves as $moves): ?>

                    <h5><?php echo $moves->move_name ?></h5>
                    <?php ($moves->selected = 1) ? "<p class='pBold pItalics'>starting move</p>" : ""?>
                    <p><?php echo $moves->move_desc ?></p>

                <?php endforeach; ?>

            </div> <!-- end of panel -->
        </div> <!-- end of column -->
    </div> <!-- end of row -->


    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    ~~~~~~~~~~~~~~~~ CHARACTER BARTER ~~~~~~~~~~~~~~
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default char-sheet-panel">

                <h3>BARTER</h3>
                <div><?php echo $char->barter; ?></div>

            </div> <!-- end of panel -->
        </div> <!-- end of column -->
    </div> <!-- end of row -->


        <?php endforeach; ?>

    <button class="btn btn-primary" type="submit" name="btn_submit">Update Character</button>
</form> <!-- end of AW character form -->

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
