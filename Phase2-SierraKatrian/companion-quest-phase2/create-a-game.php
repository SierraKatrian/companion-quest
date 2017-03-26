<?php include "view/header2.php"; ?>

    <head>
        <title>Create A Game</title>
        <script src="script/create-a-game.js"></script>
    </head>

    <body>

        <main  class="content-wrapper">
            <div class="container-fluid">
                <div class="create-a-game row">
                        <h1>Game Master Portal</h1>
                        <p>
                            Welcome to the Game Master Portal. Here you can create and set up a game,
                            but don't worry you can change these preferences later if you need to.
                            Once your game is created it will appear on the START A QUEST page and
                            you will be able to invite players once you're inside your portal.
                        </p>

                        <h2>Create A Game</h2>

                <!-- FORM -->

                    <div class="col-md-12">

                    <form action="gm-portal.php" method="post" name="create-a-game-form">

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <!-- GAME NAME and GAME LANGUAGE -->
                            <div class="game-name game-lang row">

                                <!-- GAME NAME -->
                                <div class="gameNameDIV form-group col-md-6">
                                    <label for="gameName">Game Name:</label>
                                    <span class="gameNameError" value=""></span>
                                    <input type="text" class="gameName form-control" name="gameName" />
                                </div>

                                <!-- GAME LANGUAGE -->
                                <div class="gameLanguageDIV form-group col-md-6">
                                    <label for="gamelanguage">Language Preference:</label><br />
                                    <select name="gamelanguage">
                                        <option value="chooseLanguage">-- Choose A Language --</option>
                                        <option value="english">English</option>
                                        <option value="french">French</option>
                                        <option value="spanish">Spanish</option>
                                        <option value="french">Mandarin</option>
                                        <option value="french">Arabic</option>
                                        <option value="french">Portuguese</option>
                                        <option value="french">Hindi</option>
                                        <option value="french">Russian</option>
                                        <option value="french">Japanese</option>
                                        <option value="french">Korean</option>
                                    </select>
                                </div>

                            </div><!--END of GAME NAME and GAME LANGUAGE ROW-->
                        </div>
                    </div>

                    <!--GAME THEME-->

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="game-theme row">
                                <div class="gameThemeDIV form-group">
                                    <div class="col-md-12">
                                        <label for="gameTheme">Choose Theme (click image below to choose):</label>
                                    </div>

                                    <!--APOCALYPSE WORLD THEME-->

                                    <div class="gameTheme apocalypse-world col-md-6">

                                        <label class="theme-label" for="apocalypse-theme-radio">
                                            <input id="apocalypse-theme-radio" class="theme-radio" type="radio" name="theme" value="apocalypse-theme" />
                                            <img id="apocalypse-theme-radio-ID" class="theme-img" src="img/create-a-game/apocalypse-world-thumb.jpg" />
                                        </label>

                                        <h3>Apocalypse World</h3>
                                        <p>
                                            Nobody remembers how or why. Maybe nobody ever
                                            knew. The oldest living survivors have childhood
                                            memories of it: cities burning, society in chaos then
                                            collapse, families set to panicked flight, the weird
                                            nights when the smoldering sky made midnight into
                                            a blood-colored half-day.
                                        </p>

                                        <!--Apocalypse World Rulebook Modal-->
                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#ApocalypseModal"><span class="glyphicon glyphicon-file"></span>&nbsp;view rulebook</button>
                                        <div id="ApocalypseModal" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
                                                        <object width="525" height="500" data="files/Apocalypse-World-Rulebook.pdf"></object>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- END of Apocalypse World Rulebook Modal -->

                                    </div><!-- END of apocalypse world col -->

                                    <!-- DUNGEON WORLD THEME -->

                                    <div class="gameTheme dungeon-world col-md-6">

                                        <label class="theme-label" for="dungeon-theme-radio">
                                            <input id="dungeon-theme-radio" class="theme-radio" type="radio" name="theme" value="dungeon-theme" />
                                            <img class="theme-img" src="img/create-a-game/dungeon-world-thumb.jpg" />
                                        </label>

                                        <h3>Dungeon World</h3>
                                        <p>
                                            Explore a land of magic and danger in the roles of
                                            adventurers searching for fame, gold, and glory. Delve
                                            into goblin holes or chance a dragon's lair. Dungeon World
                                            takes classic fantasy and approaches it with new rules.
                                        </p>
                                        <br />

                                        <!-- Dungeon World Rulebook Modal -->
                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#DungeonModal"><span class="glyphicon glyphicon-file"></span>&nbsp;view rulebook</button>

                                        <div id="DungeonModal" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
                                                        <object width="525" height="500" data="files/Dungeon-World-Rulebook.pdf"></object>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- END of Dungeon World Rulebook Modal -->

                                    </div><!-- END of dungeon world row -->

                                </div><!-- END of game theme DIV -->
                            </div><!--END of game theme row-->
                        </div>
                    </div><!-- END of GAME THEME panel -->

                    <!--CHARACTER SELECT-->

                    <!-- Apocalypse World Characters -->
                    <div id="apocalypse-world-character-panel">
                    <div class="panel panel-default">
                        <div class="panel-body">
                                <label for="form__gameCharacters">Select Playable Characters:</label><br />
                                    <div class="container-fluid">

                                        <!-- DW row 1 -->
                                        <div class="row dw_row1">
                                            <div class="col-md-12">
                                                <div class="col-md-2">
                                                    <label class="character-label" for="aw_angel">
                                                        <input id="aw_angel" class="character-chk" type="checkbox" name="aw_angel" value="Angel" />
                                                        <img id="aw_angel-img" class="character-img" src="img/create-a-game/apocalypse-world-characters/angel.jpg" />
                                                        <p>Angel</p>
                                                    </label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="character-label" for="aw_battlebabe">
                                                        <input id="aw_battlebabe" class="character-chk" type="checkbox" name="aw_battlebabe" value="Battlebabe" />
                                                        <img id="aw_battlebabe-img" class="character-img" src="img/create-a-game/apocalypse-world-characters/battlebabe.jpg" />
                                                        <p>Battlebabe</p>
                                                    </label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="character-label" for="aw_brainer">
                                                        <input id="aw_brainer" class="character-chk" type="checkbox" name="aw_brainer" value="Brainer" />
                                                        <img id="aw_brainer-img" class="character-img" src="img/create-a-game/apocalypse-world-characters/brainer.jpg" />
                                                        <p>Brainer</p>
                                                    </label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="character-label" for="aw_chopper">
                                                        <input id="aw_chopper" class="character-chk" type="checkbox" name="aw_chopper" value="Chopper" />
                                                        <img id="aw_chopper-img" class="character-img" src="img/create-a-game/apocalypse-world-characters/chopper.jpg" />
                                                        <p>Chopper</p>
                                                    </label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="character-label" for="aw_driver">
                                                        <input id="aw_driver" class="character-chk" type="checkbox" name="aw_driver" value="Driver" />
                                                        <img id="aw_driver-img" class="character-img" src="img/create-a-game/apocalypse-world-characters/driver.jpg" />
                                                        <p>Driver</p>
                                                    </label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="character-label" for="aw_gunslugger">
                                                        <input id="aw_gunslugger" class="character-chk" type="checkbox" name="aw_gunslugger" value="Gunslugger" />
                                                        <img id="aw_gunslugger-img" class="character-img" src="img/create-a-game/apocalypse-world-characters/gunslugger.jpg" />
                                                        <p>Gunslugger</p>
                                                    </label>
                                                </div>
                                            </div>
                                        </div><!-- END of row1 -->

                                        <!-- DW row 2 -->
                                        <div class="row dw_row2">
                                            <div class="col-md-12">
                                                <div class="col-md-2">
                                                    <label class="character-label" for="aw_hardholder">
                                                        <input id="aw_hardholder" class="character-chk" type="checkbox" name="aw_hardholder" value="Hardholder" />
                                                        <img id="aw_hardholder-img" class="character-img" src="img/create-a-game/apocalypse-world-characters/hardholder.jpg" />
                                                        <p>Hardholder</p>
                                                    </label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="character-label" for="aw_hocus">
                                                        <input id="aw_hocus" class="character-chk" type="checkbox" name="aw_hocus" value="Hocus" />
                                                        <img id="aw_hocus-img" class="character-img" src="img/create-a-game/apocalypse-world-characters/hocus.jpg" />
                                                        <p>Hocus</p>
                                                    </label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="character-label" for="aw_maestro-D">
                                                        <input id="aw_maestro-D" class="character-chk" type="checkbox" name="aw_maestro-D" value="Maestro D" />
                                                        <img id="aw_maestro-D-img" class="character-img" src="img/create-a-game/apocalypse-world-characters/maestro_d.jpg" />
                                                        <p>Maestro D</p>
                                                    </label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="character-label" for="aw_savvyhead">
                                                        <input id="aw_savvyhead" class="character-chk" type="checkbox" name="aw_savvyhead" value="Savvyhead" />
                                                        <img id="aw_savvyhead-img" class="character-img" src="img/create-a-game/apocalypse-world-characters/savvyhead.jpg" />
                                                        <p>Savvyhead</p>
                                                    </label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="character-label" for="aw_skinner">
                                                        <input id="aw_skinner" class="character-chk" type="checkbox" name="aw_skinner" value="Skinner" />
                                                        <img id="aw_skinner-img" class="character-img" src="img/create-a-game/apocalypse-world-characters/skinner.jpg" />
                                                        <p>Skinner</p>
                                                    </label>
                                                </div>
                                            </div>
                                        </div><!-- END of row2 -->
                                    </div><!-- END of container-fluid -->
                            </div><!-- END of panel body -->
                        </div><!-- END of panel-default -->
                    </div>

                    <!-- Dungeon World Characters -->
                    <div id="dungeon-world-character-panel">
                    <div class="panel panel-default">
                        <div class="panel-body">
                                <label for="form__gameCharacters">Select Playable Characters:</label><br />
                                    <div class="container-fluid">

                                        <!-- DW row 1 -->
                                        <div class="row dw_row1">
                                            <div class="col-md-12">
                                                <div class="col-md-2">
                                                    <label class="character-label" for="dw_barbarian">
                                                        <input id="dw_barbarian" class="character-chk" type="checkbox" name="dw_barbarian" value="Barbarian" />
                                                        <img id="dw_barbarian-img" class="character-img" src="img/create-a-game/dungeon-world-characters/barbarian.jpg" />
                                                        <p>Barbarian</p>
                                                    </label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="character-label" for="dw_bard">
                                                        <input id="dw_bard" class="character-chk" type="checkbox" name="dw_bard" value="Bard" />
                                                        <img id="dw_bard-img" class="character-img" src="img/create-a-game/dungeon-world-characters/bard.jpg" />
                                                        <p>Bard</p>
                                                    </label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="character-label" for="dw_cleric">
                                                        <input id="dw_cleric" class="character-chk" type="checkbox" name="dw_cleric" value="Cleric" />
                                                        <img id="dw_cleric-img" class="character-img" src="img/create-a-game/dungeon-world-characters/cleric.jpg" />
                                                        <p>Cleric</p>
                                                    </label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="character-label" for="dw_druid">
                                                        <input id="dw_druid" class="character-chk" type="checkbox" name="dw_druid" value="Druid" />
                                                        <img id="dw_druid-img" class="character-img" src="img/create-a-game/dungeon-world-characters/druid.jpg" />
                                                        <p>Druid</p>
                                                    </label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="character-label" for="dw_fighter">
                                                        <input id="dw_fighter" class="character-chk" type="checkbox" name="dw_fighter" value="Fighter" />
                                                        <img id="dw_fighter-img" class="character-img" src="img/create-a-game/dungeon-world-characters/fighter.jpg" />
                                                        <p>Fighter</p>
                                                    </label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="character-label" for="dw_immolator">
                                                        <input id="dw_immolator" class="character-chk" type="checkbox" name="dw_immolator" value="Immolator" />
                                                        <img id="dw_immolator-img" class="character-img" src="img/create-a-game/dungeon-world-characters/immolator.jpg" />
                                                        <p>Immolator</p>
                                                    </label>
                                                </div>
                                            </div>
                                        </div><!-- END of row1 -->

                                        <!-- DW row 2 -->
                                        <div class="row dw_row2">
                                            <div class="col-md-12">
                                                <div class="col-md-2">
                                                    <label class="character-label" for="dw_paladin">
                                                        <input id="dw_paladin" class="character-chk" type="checkbox" name="dw_paladin" value="Paladin" />
                                                        <img id="dw_paladin-img" class="character-img" src="img/create-a-game/dungeon-world-characters/paladin.jpg" />
                                                        <p>Paladin</p>
                                                    </label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="character-label" for="dw_ranger">
                                                        <input id="dw_ranger" class="character-chk" type="checkbox" name="dw_ranger" value="Ranger" />
                                                        <img id="dw_ranger-img" class="character-img" src="img/create-a-game/dungeon-world-characters/ranger.jpg" />
                                                        <p>Ranger</p>
                                                    </label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="character-label" for="dw_thief">
                                                        <input id="dw_thief" class="character-chk" type="checkbox" name="dw_thief" value="Thief" />
                                                        <img id="dw_thief-img" class="character-img" src="img/create-a-game/dungeon-world-characters/thief.jpg" />
                                                        <p>Thief</p>
                                                    </label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="character-label" for="dw_wizard">
                                                        <input id="dw_wizard" class="character-chk" type="checkbox" name="dw_wizard" value="Wizard" />
                                                        <img id="dw_wizard-img" class="character-img" src="img/create-a-game/dungeon-world-characters/wizard.jpg" />
                                                        <p>Wizard</p>
                                                    </label>
                                                </div>
                                            </div>
                                        </div><!-- END of row2 -->
                                    </div><!-- END of container-fluid -->
                            </div><!-- END of panel body -->
                        </div><!--END of panel default-->
                    </div><!--END of apocalypse-world-character-panel-->

                    <!--FORM SUBMIT-->

                    <div class="form__submitBtnDIV">
                    <input type="submit" class="btn btn-primary" name="submit" value="Create Game!" />
                    </div>
                    <br />
                    <br />
                </form>
            </div>
        </main>
    </body>
</html>

<?php include "view/footer.php"; ?>
