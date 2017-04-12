<?php

    include "View/Header.php";

    //user details

    $userDetails = $_SESSION['user'];

    $fname = $userDetails['f_name'];
    $lname = $userDetails['l_name'];
    $username = $userDetails['user_name'];
    $email = $userDetails['email'];
    $password = $userDetails['password'];

    //game details

    $gameDetails = $_SESSION['gameDetails'];

    $ruleBook = $gameDetails['rb_id'];
    $gameID = $gameDetails['id'];
    $gameName = $gameDetails['game_name'];
    $gameLanguage = $gameDetails['lang'];
    $gamePlayerTotal = $gameDetails['max_players'];
    $gameStatus = $gameDetails['game_status'];

?>

<body>

    <div class="access-definitions-container affix-top" data-spy="affix" data-offset-top="70">
        <div class="row wrapper">
          <div class="col-md-12 access-definitions">
            <span class="access-colours-text">notes from GM</span>
          </div>
        </div>
    </div>

    <div class="wrapper">
        <div class="delete-game-btn-container">
            <button type="button" class="btn btn-danger leave-game-btn">
                Leave Game
            </button>
        </div>
    </div>

    <!--BANNER-->

    <?php

        if ($ruleBook == 1) {
            include "View/apocalypse-world-banner.php";
        } else {
            include "View/dungeon-world-banner.php";
        }

    ?>

    <div class="gap-10px"></div>
    <div class="gap-10px"></div>

    <div class="col-md-12 portal-intro-message">
        <div class="wrapper">
            <h1>Player Portal</h1>
            <p>
                Welcome to the Player's Portal <?echo $fname?>! Here you can check your stats and read
                messages from the GM as well as join your quest and much more.
            </p>
        </div>
    </div>

<main class="container-fluid wrapper">

    <!--TABS-->
    <ul class="nav nav-tabs">
        <li class="active"><a class="tab-links" href="#1" data-toggle="tab">INFO</a></li>
        <li><a href="#2" class="tab-links" data-toggle="tab">STATS</a></li>
    </ul>

    <!--TAB CONTENT-->

    <div class="tab-content">
        <div class="tab-pane active" id="1">
            <?php include "View/player-portal-INFO.php" ?>
        </div>
        <div class="tab-pane" id="2">
            <?php include "View/player-portal-STATS.php" ?>
        </div>
    </div>

    <div class="gap-10px"></div>
    <div class="gap-10px"></div>
    <a href="Game-Page.php"><button type="button" class="btn btn-primary go-to-game-btn">Go To Game!&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-right"></span><span class="glyphicon glyphicon-chevron-right"></span></button></a>

</main>

<?php include "View/Footer.php"; ?>
