<?php
    require_once "View/Header.php";
    require_once 'Models/CharacterDAO.php';
    $charClass = new CharacterDAO();

    //User details
    $userDetails = $_SESSION['user'];

    $userID = $userDetails['id'];
    $fname = $userDetails['f_name'];
    $lname = $userDetails['l_name'];
    $username = $userDetails['user_name'];
    $email = $userDetails['email'];
    $password = $userDetails['password'];

    //Game details
    $gameDetails = $_SESSION['gameDetails'];

    $gameID = $gameDetails['id'];
    $ruleBook = $gameDetails['rb_id'];
    $gameName = $gameDetails['game_name'];
    $gameLanguage = $gameDetails['lang'];
    $gamePlayerTotal = $gameDetails['max_players'];
    $gameStatus = $gameDetails['game_status'];

    $characterDetails = $_SESSION['characterDetails'];
    // $characterID = $characterDetails['id'];

    // $charDetails = $_SESSION['charDetails'];

    // $charID = $charDetails['id'];s

    // echo 'Character ID: ' . $charID;

	//Game ID session coming from current-games
   if(isset($_POST['games_portal'])){
   $_SESSION['id'] = $_POST['games_portal'];
   $gameId = $_SESSION['id'];
   }

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
                Welcome to the Player's Portal <?php echo $fname?>! Here you can check your stats and read
                messages from the GM as well as join your quest and much more.
            </p>
        </div>
    </div>

<main class="container-fluid wrapper">
    <!--EDIT YOUR QUEST-->
    <div class="row">

        <!--LEFT SIDE FORM COLUMN-->
        <div class="col-md-4">

            <h2>Game Info</h2>

            <!--GAME NAME-->
                <div>
                    <label for="edit-game-name">Game Name:</label>
                    <div class="bigGameNameInput"><?= $gameName ?></div>
                </div>

                <div class="gap-10px"></div>

                <div>
                      <label for="gamePlayerTotal">Total Players Allowed:</label>
                      <div class="gamePlayerTotal">
                          <?= $gamePlayerTotal ?>
                      </div>
                </div>

            <!--PLAYERS-->
            <h2>Player Info</h2>

            <div class="list-group-item active col-md-12">
                <h3>Current Players</h3>
            </div>

            <div class="list-group">
                <div class="list-group-item player-info-table">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Status</th>
                            <th>Username</th>
                            <th>Character Name</th>
                            <th>Character</th>
                        </tr>
                        </thead>
                        <tbody>

                            <?php include 'Models/invitesList.php' ?>
                        </tbody>
                    </table>
                </div><!--end of list-group-item-->
            </div><!--end of list-group-->

            <!--NOTES AND NOTICES-->
            <h2>notes</h2>
            <div class="panel panel-default">
                <div class="panel-body">

                    <!--TABS-->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#1" class="tab-links" data-toggle="tab">Notes</a></li>
                        </ul>

                    <!--TAB CONTENT-->
                        <div class="tab-content">
                            <div class="tab-pane active" id="1">
                                <div class="form-group">
                                    <div class="gap-10px"></div>
                                    <label for="comment">This is private:</label>
                                    <div class="gap-10px"></div>
                                    <textarea class="form-control" rows="15" id="comment"></textarea>
                                </div>
                                <button class="btn btn-primary" type="submit">
                                    <span class="glyphicon glyphicon-floppy-disk"></span>
                                </button>
                            </div>
                        </div>
                    </div><!--end of panel body-->
                </div><!--end of panel class-->
            </div><!--end of col-->

        <!--RIGHT SIDE FORM COLUMN-->
        <div class="col-md-8">
            <?php include "View/Character-Sheet.php" ?>
        </div>

    </div><!--end of row-->

    <div class="gap-10px"></div>
    <div class="gap-10px"></div>
    <a href="game-room.php"><button type="button" class="btn btn-primary go-to-game-btn">Go To Game!&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-right"></span><span class="glyphicon glyphicon-chevron-right"></span></button></a>

</main>

<?php include "View/Footer.php"; ?>

<script type="text/javascript" src="./Script/select-playable-char.js"></script>
