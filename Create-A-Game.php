<?php

    include "View/Header.php";

    $userDetails = $_SESSION['user'];

    $userID = $userDetails['id'];
    $fname = $userDetails['f_name'];
    $lname = $userDetails['l_name'];
    $username = $userDetails['user_name'];
    $email = $userDetails['email'];
    $password = $userDetails['password'];

    if(isset($_POST['create-game'])) {

    //REASSIGN VARIABLES

        $gameName = $_POST['gameName'];
        $gameLanguage = $_POST['gameLanguage']; //this takes a value from the game language drop down
        $playerNumber = $_POST['playerNumber']; //this takes a vlue from the total players drop down
        $ruleBook = $_POST['ruleBook']; //this takes a value from the radio
        $lname = $_POST['registrationForm__lName']; //
        $username = $_POST['registrationForm__userName'];
        $password = $_POST['registrationForm__password'];
        $email = $_POST['registrationForm__email'];

    }

?>

<body>

<main class="container-fluid wrapper">

    <div class="row green">

        <div class="col-md-12 red">
            <h1>Game Master Portal</h1>
            <p>
                Welcome to the Game Master Portal <?echo $fname?>! Here you can create and set up a game, but don't
                worry you can change these preferences later if you need to. Once your game is created it will appear
                on the START A QUEST page and you will be able to invite players once you're inside your portal.
            </p>
        </div>

    </div><!--end of row-->

    <!--CREATE A GAME-->

    <h2>Start a quest!</h2>

    <form action="" method="get" name="advanced-search" class="container-fluid find-a-game-form">
        <div class="row">
            <div class="col-md-6 find-a-quest-form-elements">
                <label for="gameName">Game Name:</label>
                <input type="text" class="form-control" name="gameName"/>
            </div>
            <div class="col-md-3 find-a-quest-form-elements">
                <label for="gameLanguage">Language:</label>
                <select name="gameLanguage">
                    <option value="chooseLanguage">-- Choose A Language --</option>
                    <option value="en">English</option>
                    <option value="fr">French</option>
                    <option value="es">Spanish</option>
                    <option value="zh">Mandarin</option>
                    <option value="ar">Arabic</option>
                    <option value="pt">Portuguese</option>
                    <option value="hi">Hindi</option>
                    <option value="ru">Russian</option>
                    <option value="ja">Japanese</option>
                    <option value="ko">Korean</option>
                </select>
            </div>
            <div class="col-md-3 find-a-quest-form-elements">
                <label for="gamePlayerTotal">Total Players Allowed:</label>
                <select name="gamePlayerTotal">
                    <option value="chooseTotal">-- Choose Total --</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>
        </div>

        <!--CHOOSE RULEBOOK-->

        <div class="row">
                <div class="gap-10px"></div>
                <div class="gap-10px"></div>
                <label class="col-md-12">Choose A Theme (click image below to choose):</label>

                <!--APOCALYPSE WORLD -->

                    <div class="col-md-6 choose-img-thumb-container">

                        <!--image-->
                        <label class="full-width" for="apocalypse-theme-radio">
                            <input id="apocalypse-theme-radio" class="theme-radio" type="radio" name="ruleBook" value="1" />
                            <img class="choose-img-thumb full-width" src="./Images/apocalypse-world-thumb.jpg" />
                        </label>

                        <!--rulebook modal-->
                        <button type="button" class="btn btn-info btn-lg full-width rulebook-btn" data-toggle="modal" data-target="#ApocalypseModal"><span class="glyphicon glyphicon-file"></span>&nbsp;view rulebook</button>
                        <?php include "View/Modals/rulebook-apocalypseworld.php" ?>

                    </div>

                <!--DUNGEON WORLD-->

                    <div class="col-md-6 choose-img-thumb-container">

                        <!--image-->
                        <label class="full-width" for="dungeon-theme-radio">
                            <input id="dungeon-theme-radio" class="theme-radio" type="radio" name="ruleBook" value="2" />
                            <img class="choose-img-thumb full-width" src="./Images/dungeon-world-thumb.jpg" />
                        </label>

                        <!--rulebook modal-->
                        <button type="button" class="btn btn-info btn-lg full-width rulebook-btn" data-toggle="modal" data-target="#DungeonModal"><span class="glyphicon glyphicon-file"></span>&nbsp;view rulebook</button>
                        <?php include "View/Modals/rulebook-dungeonworld.php" ?>
                    </div>

        </div><!--end of row-->

        <!-- Apocalypse World Characters -->
        <div id="apocalypse-world-character-panel">
            <label>APOCALYPSE WORLD : Choose your characters</label>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-1 character-thumb-container">
                            <label for="aw_angel">
                                <input id="aw_angel" class="character-chk" type="checkbox" name="aw_angel" value="Angel" />
                                <img class="character-img" src="./Images/apocalypse-world-characters/angel.jpg" />
                                <p>Angel</p>
                            </label>
                        </div>
                        <div class="col-md-1 character-thumb-container">
                            <label for="aw_battlebabe">
                                <input id="aw_battlebabe" class="character-chk" type="checkbox" name="aw_battlebabe" value="Battlebabe" />
                                <img class="character-img" src="./Images/apocalypse-world-characters/battlebabe.jpg" />
                                <p>Battlebabe</p>
                            </label>
                        </div>
                        <div class="col-md-1 character-thumb-container">
                            <label for="aw_brainer">
                                <input id="aw_brainer" class="character-chk" type="checkbox" name="aw_brainer" value="Brainer" />
                                <img class="character-img" src="./Images/apocalypse-world-characters/brainer.jpg" />
                                <p>Brainer</p>
                            </label>
                        </div>
                        <div class="col-md-1 character-thumb-container">
                            <label for="aw_chopper">
                                <input id="aw_chopper" class="character-chk" type="checkbox" name="aw_chopper" value="Chopper" />
                                <img class="character-img" src="./Images/apocalypse-world-characters/chopper.jpg" />
                                <p>Chopper</p>
                            </label>
                        </div>
                        <div class="col-md-1 character-thumb-container">
                            <label for="aw_driver">
                                <input id="aw_driver" class="character-chk" type="checkbox" name="aw_driver" value="Driver" />
                                <img class="character-img" src="./Images/apocalypse-world-characters/driver.jpg" />
                                <p>Driver</p>
                            </label>
                        </div>
                        <div class="col-md-1 character-thumb-container">
                            <label for="aw_gunslugger">
                                <input id="aw_gunslugger" class="character-chk" type="checkbox" name="aw_gunslugger" value="Gunslugger" />
                                <img class="character-img" src="./Images/apocalypse-world-characters/gunslugger.jpg" />
                                <p>Gunslugger</p>
                            </label>
                        </div>
                        <div class="col-md-1 character-thumb-container">
                            <label for="aw_hardholder">
                                <input id="aw_hardholder" class="character-chk" type="checkbox" name="aw_hardholder" value="Hardholder" />
                                <img class="character-img" src="./Images/apocalypse-world-characters/hardholder.jpg" />
                                <p>Hardholder</p>
                            </label>
                        </div>
                        <div class="col-md-1 character-thumb-container">
                            <label for="aw_hocus">
                                <input id="aw_hocus" class="character-chk" type="checkbox" name="aw_hocus" value="Hocus" />
                                <img class="character-img" src="./Images/apocalypse-world-characters/hocus.jpg" />
                                <p>Hocus</p>
                            </label>
                        </div>
                        <div class="col-md-1 character-thumb-container">
                            <label for="aw_maestro-D">
                                <input id="aw_maestro-D" class="character-chk" type="checkbox" name="aw_maestro-D" value="Maestro D" />
                                <img class="character-img" src="./Images/apocalypse-world-characters/maestro_d.jpg" />
                                <p>Maestro D</p>
                            </label>
                        </div>
                        <div class="col-md-1 character-thumb-container">
                            <label for="aw_savvyhead">
                                <input id="aw_savvyhead" class="character-chk" type="checkbox" name="aw_savvyhead" value="Savvyhead" />
                                <img class="character-img" src="./Images/apocalypse-world-characters/savvyhead.jpg" />
                                <p>Savvyhead</p>
                            </label>
                        </div>
                        <div class="col-md-1 character-thumb-container">
                            <label for="aw_skinner">
                                <input id="aw_skinner" class="character-chk" type="checkbox" name="aw_skinner" value="Skinner" />
                                <img class="character-img" src="./Images/apocalypse-world-characters/skinner.jpg" />
                                <p>Skinner</p>
                            </label>
                        </div>
                    </div><!--end of row-->
                </div><!--end of panel-body-->
            </div><!--end of panel panel-default-->
        </div><!--end of apocalypse world character panel-->

        <!-- Dungeon World Characters -->
        <div id="dungeon-world-character-panel">
            <label>DUNGEON WORLD : Choose your characters</label>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-1 character-thumb-container">
                            <label for="dw_barbarian">
                                <input id="dw_barbarian" class="character-chk" type="checkbox" name="dw_barbarian" value="Barbarian" />
                                <img class="character-img" src="./Images/dungeon-world-characters/barbarian.jpg" />
                                <p>Barbarian</p>
                            </label>
                        </div>
                        <div class="col-md-1 character-thumb-container">
                            <label for="dw_bard">
                                <input id="dw_bard" class="character-chk" type="checkbox" name="dw_bard" value="Bard" />
                                <img class="character-img" src="./Images/dungeon-world-characters/bard.jpg" />
                                <p>Bard</p>
                            </label>
                        </div>
                        <div class="col-md-1 character-thumb-container">
                            <label for="dw_cleric">
                                <input id="dw_cleric" class="character-chk" type="checkbox" name="dw_cleric" value="Cleric" />
                                <img class="character-img" src="./Images/dungeon-world-characters/cleric.jpg" />
                                <p>Cleric</p>
                            </label>
                        </div>
                        <div class="col-md-1 character-thumb-container">
                            <label for="dw_druid">
                                <input id="dw_druid" class="character-chk" type="checkbox" name="dw_druid" value="Druid" />
                                <img class="character-img" src="./Images/dungeon-world-characters/druid.jpg" />
                                <p>Druid</p>
                            </label>
                        </div>
                        <div class="col-md-1 character-thumb-container">
                            <label for="dw_fighter">
                                <input id="dw_fighter" class="character-chk" type="checkbox" name="dw_fighter" value="Fighter" />
                                <img class="character-img" src="./Images/dungeon-world-characters/fighter.jpg" />
                                <p>Fighter</p>
                            </label>
                        </div>
                        <div class="col-md-1 character-thumb-container">
                            <label for="dw_immolator">
                                <input id="dw_immolator" class="character-chk" type="checkbox" name="dw_immolator" value="Immolator" />
                                <img class="character-img" src="./Images/dungeon-world-characters/immolator.jpg" />
                                <p>Immolator</p>
                            </label>
                        </div>
                        <div class="col-md-1 character-thumb-container">
                            <label for="dw_paladin">
                                <input id="dw_paladin" class="character-chk" type="checkbox" name="dw_paladin" value="Paladin" />
                                <img class="character-img" src="./Images/dungeon-world-characters/paladin.jpg" />
                                <p>Paladin</p>
                            </label>
                        </div>
                        <div class="col-md-1 character-thumb-container">
                            <labelfor="dw_ranger">
                                <input id="dw_ranger" class="character-chk" type="checkbox" name="dw_ranger" value="Ranger" />
                                <img class="character-img" src="./Images/dungeon-world-characters/ranger.jpg" />
                                <p>Ranger</p>
                            </label>
                        </div>
                        <div class="col-md-1 character-thumb-container">
                            <label for="dw_thief">
                                <input id="dw_thief" class="character-chk" type="checkbox" name="dw_thief" value="Thief" />
                                <img class="character-img" src="./Images/dungeon-world-characters/thief.jpg" />
                                <p>Thief</p>
                            </label>
                        </div>
                        <div class="col-md-1 character-thumb-container">
                            <label for="dw_wizard">
                                <input id="dw_wizard" class="character-chk" type="checkbox" name="dw_wizard" value="Wizard" />
                                <img class="character-img" src="./Images/dungeon-world-characters/wizard.jpg" />
                                <p>Wizard</p>
                            </label>
                        </div>
                    </div><!--end of row-->
                </div><!--end of panel-body-->
            </div><!--end of panel panel-default-->
        </div><!--end of apocalypse world character panel-->

        <div class="form-group">
            <label for="comment">Leave a note for players:</label>
            <textarea class="form-control" rows="5" id="comment">Welcome to the game!</textarea>
        </div>

        <div class="gap-10px"></div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="create-game" value="Create Game!" />
        </div>

    </form>

</main>

<?php include "View/Footer.php"; ?>
