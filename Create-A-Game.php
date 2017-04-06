<?php
    require_once "View/Header.php";

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
        $playerNumber = $_POST['playerNumber']; //this takes a value from the total players drop down
        $ruleBook = $_POST['ruleBook']; //this takes a value from the radio
        $lname = $_POST['registrationForm__lName']; //
        $username = $_POST['registrationForm__userName'];
        $password = $_POST['registrationForm__password'];
        $email = $_POST['registrationForm__email'];
        $gameID = 1;

        if(array_key_exists('availChars', $_POST) && !empty($_POST['availChars'])) {
            foreach($_POST['availChars'] as $check) {

                require_once './Models/DbConnect.php';
                require_once './Models/AvailCharactersDAO.php';

                $dbClass = new DbConnect();
                $db = $dbClass->getDB();

                $availCharClass = new AvailCharactersDAO();
                $setAvailChars = $availCharClass->setAvailCharacters($db, $check, $gameID);


                    echo " ---- Rulebook #: " . $ruleBook . " | Name: " . $check;
            }
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

    <form action="" method="post" name="advanced-search" class="container-fluid find-a-game-form">
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
                <label for="playerNumber">Total Players Allowed:</label>
                <select name="playerNumber">
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
                        <?php require_once "View/Modals/rulebook-apocalypseworld.php" ?>

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
                        <?php require_once "View/Modals/rulebook-dungeonworld.php" ?>
                    </div>

        </div><!--end of row-->

        <!-- Apocalypse World Characters -->
        <div id="apocalypse-world-character-panel">
            <label>APOCALYPSE WORLD : Choose your characters</label>
            <?php require_once 'View/LimitAWCharacters.php'; ?>
        </div><!--end of apocalypse world character panel-->

        <!-- Dungeon World Characters -->
        <div id="dungeon-world-character-panel">
            <label>DUNGEON WORLD : Choose your characters</label>
            <?php require_once 'View/LimitDWCharacters.php'; ?>
        </div><!--end of dungeon world character panel-->

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

<script type="text/javascript" src="Script/create-a-game.js"></script>
<script type="text/javascript" src="Script/limit-char.js"></script>


<?php include "View/Footer.php"; ?>
