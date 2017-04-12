<?php
    require_once "View/Header.php";

    //call database query class

        $GameDAO = new GameDAO($db);

    //make user Session available

        $userDetails = $_SESSION['user'];

        $userID = (intval($userDetails['id']));
        $fname = $userDetails['f_name'];
        $lname = $userDetails['l_name'];
        $username = $userDetails['user_name'];
        $email = $userDetails['email'];
        $password = $userDetails['password'];

    //declare variables

        $gameName = "";
        $gameLanguage = "";
        $gamePlayerTotal = intval("");
        $ruleBook = intval("");
        $notice = "";

    //error message variables

        $output_gameName = "";
        $output_gameLanguage = "";
        $output_gamePlayerTotal = "";
        $output_ruleBook = "";
        $output_pageError = "";

    //instance of Validation method

        require_once "Models/Validation.php";
        $validator = new Validation();

    //run code when create game button is clicked

    if(isset($_POST['create-game'])) {

        //VALIDATION

        if(isset($_POST['gameName'])){

            //set and get values
            $validator->setText($_POST['gameName']);
            $gameName = $validator->getText();

            //validation
            $validator->validate_empty();
            $validator->validate_lengthmax20();
            $validator->validate_regexpassword();
            $validator->validate_lengthmin5();

            //output
            $output_gameName = $validator->output;

        }

        if(isset($_POST['gameLanguage'])){

            //set and get values
            $validator->setText($_POST['gameLanguage']);
            $gameLanguage = $validator->getText();

            //validation
            $validator->validate_defaultdropdown();

            //output
            $output_gameLanguage = $validator->output;

        }

        if(isset($_POST['gamePlayerTotal'])){

            //set and get values
            $validator->setText(intval($_POST['gamePlayerTotal']));
            $gamePlayerTotal = $validator->getText();

            //validation
            $validator->validate_zerodropdown();

            //output
            $output_gamePlayerTotal = $validator->output;
        }

        if(isset($_POST['ruleBook'])){

            //set and get values
            $validator->setText(intval($_POST['ruleBook']));
            $ruleBook = $validator->getText();

        } else {

            //validation
            $validator->setError();
            $output_ruleBook = "select a theme";

        }

        if(isset($_POST['notice'])){

            //set and get values
            $validator->setText($_POST['notice']);
            $notice = $validator->getText();

            //no validation required

        }


        //RUN AUTHENTICATION

        if($validator->getError() == false) {

            //check for duplicated input values
            $gameNameIsUnique = $GameDAO->READ_CheckDuplicateGame($gameName);

            if ($gameNameIsUnique) {

                //insert values into db
                $createGame = $GameDAO->CREATE_Game($ruleBook, $gameName, $gameLanguage, $gamePlayerTotal);

                if($createGame) {

                    //create a session with game details
                    $gameDetails = $GameDAO->READ_GameDetails($gameName);
                    $_SESSION['gameDetails'] = $gameDetails;

                    $gameID = (intval($gameDetails['id']));

                    //write user games details
                    $createUserGame = $GameDAO->CREATE_UserGame($userID, $gameID, $notice);

                    //Create a chat room for the created game
                    require_once "Models/ChatRoomDAO.php";
                    $chatroom = new ChatRoom();
                    $chatroom->setChatRoom($db,$gameDetails['id']);

                    if($createUserGame) {

                        $goToGmPortal = "<script type='text/javascript'>location.replace('GM-Portal.php'); </script>";
                        echo $goToGmPortal;
                        exit();

                    } else {

                        //delete userGame and go back to create-a-game.php
                        $output_pageError = "user games error";

                    }

                } else {

                    $output_pageError = "create game failed";

                }

            } else {

                //output
                $output_gameName = "this game name already exists";

            }

        }


        // CHARACTER SELECTOR
        if(array_key_exists('availChars', $_POST) && !empty($_POST['availChars'])) {
            require_once './Models/DbConnect.php';
            require_once './Models/AvailCharactersDAO.php';

            $dbClass = new DbConnect();
            $db = $dbClass->getDB();

            $availCharClass = new AvailCharactersDAO();

            foreach($_POST['availChars'] as $check) {
                if (isset($_POST['availChars'])) {
                    $check = 1;
                    $setAvailChars = $availCharClass->setAvailCharacters($db, $check, $gameID);
                } else {
                    $check = 0;
                    $setAvailChars = $availCharClass->setAvailCharacters($db, $check, $gameID);
                }
            }
            // foreach($_POST['availChars'] as $check) {
            //
            //     $check = ($check) ? 1 : 0;
            //
            //
            //
            //         echo " ---- Rulebook #: " . $ruleBook . " | Name: " . $check;
            // }
        }
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

    <form action="create-a-game.php" method="post" name="advancedSearch" class="container-fluid find-a-game-form">
        <div class="row">
            <div class="col-md-6 find-a-quest-form-elements">
                <label for="gameName">Game Name <span style="color:red;">*&nbsp;<?= $output_gameName ?></span></label>
                <input type="text" class="form-control" name="gameName" value="<?= $gameName ?>"/>
            </div>
            <div class="col-md-3 find-a-quest-form-elements">
                <label for="gameLanguage">Language <span style="color:red;">*&nbsp;<?= $output_gameLanguage ?></span></label>
                <select name="gameLanguage">
                    <option value="default">-- Choose A Language --</option>
                    <option value="en" <?php if ($gameLanguage == 'en') { ?> <?= 'selected' ?> <?php }; ?>>English</option>
                    <option value="fr" <?php if ($gameLanguage == 'fr') { ?> <?= 'selected' ?> <?php }; ?>>French</option>
                    <option value="es" <?php if ($gameLanguage == 'es') { ?> <?= 'selected' ?> <?php }; ?>>Spanish</option>
                    <option value="zh" <?php if ($gameLanguage == 'zh') { ?> <?= 'selected' ?> <?php }; ?>>Mandarin</option>
                    <option value="ar" <?php if ($gameLanguage == 'ar') { ?> <?= 'selected' ?> <?php }; ?>>Arabic</option>
                    <option value="pt" <?php if ($gameLanguage == 'pt') { ?> <?= 'selected' ?> <?php }; ?>>Portuguese</option>
                    <option value="hi" <?php if ($gameLanguage == 'hi') { ?> <?= 'selected' ?> <?php }; ?>>Hindi</option>
                    <option value="ru" <?php if ($gameLanguage == 'ru') { ?> <?= 'selected' ?> <?php }; ?>>Russian</option>
                    <option value="ja" <?php if ($gameLanguage == 'ja') { ?> <?= 'selected' ?> <?php }; ?>>Japanese</option>
                    <option value="ko" <?php if ($gameLanguage == 'ko') { ?> <?= 'selected' ?> <?php }; ?>>Korean</option>
                </select>
            </div>
            <div class="col-md-3 find-a-quest-form-elements">
                <label for="gamePlayerTotal">Total Players Allowed <span style="color:red;">*&nbsp;<?= $output_gamePlayerTotal ?></span></label>
                <select name="gamePlayerTotal">
                    <option value="default">-- Choose Total --</option>
                    <option value="1" <?php if ($gamePlayerTotal == '1') { ?> <?= 'selected' ?> <?php }; ?>>1</option>
                    <option value="2" <?php if ($gamePlayerTotal == '2') { ?> <?= 'selected' ?> <?php }; ?>>2</option>
                    <option value="3" <?php if ($gamePlayerTotal == '3') { ?> <?= 'selected' ?> <?php }; ?>>3</option>
                    <option value="4" <?php if ($gamePlayerTotal == '4') { ?> <?= 'selected' ?> <?php }; ?>>4</option>
                    <option value="5" <?php if ($gamePlayerTotal == '5') { ?> <?= 'selected' ?> <?php }; ?>>5</option>
                    <option value="6" <?php if ($gamePlayerTotal == '6') { ?> <?= 'selected' ?> <?php }; ?>>6</option>
                    <option value="7" <?php if ($gamePlayerTotal == '7') { ?> <?= 'selected' ?> <?php }; ?>>7</option>
                    <option value="8" <?php if ($gamePlayerTotal == '8') { ?> <?= 'selected' ?> <?php }; ?>>8</option>
                    <option value="9" <?php if ($gamePlayerTotal == '9') { ?> <?= 'selected' ?> <?php }; ?>>9</option>
                    <option value="10" <?php if ($gamePlayerTotal == '10') { ?> <?= 'selected' ?> <?php }; ?>>10</option>
                </select>
            </div>
        </div>

        <!--CHOOSE RULEBOOK-->

        <div class="row">
            <div class="gap-10px"></div>
            <div class="gap-10px"></div>
            <label class="col-md-12">Choose A Theme (click image below to choose) <span style="color:red;">*&nbsp;<?= $output_ruleBook ?></span></label>

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

        <!--CHOOSE A CHARACTER-->
        <div class="character-panel">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row all-avail-chars">
                        <div id="showChars">

                        </div>
                    </div><!-- end of row -->
                </div><!-- end of panel-body -->
            </div><!-- end of panel panel-default -->
        </div><!-- end of apocalypse world character panel -->

        <!-- <div class="dungeon-world-character-panel">
            <label>DUNGEON WORLD : Choose your characters</label>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row all-avail-chars">
                            <div id="showDWChars">

                            </div>
                        </div> end of row
                    </div> end of panel-body
                </div> end of panel panel-default
            </div> end of dungeon world character panel -->

        <!-- Leave a message! -->
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

<script type="text/javascript" src="Script/select-chars.js"></script>

<?php include "View/Footer.php"; ?>
