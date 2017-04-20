<?php

require_once "View/Header.php";
require_once 'Models/CharacterDAO.php';

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

    // require_once './Models/DbConnect.php';

    $dbClass = new DbConnect();
    $db = $dbClass->getDB();

    //GET CURRENT GAMES AVAILABLE CHARACTERS
    $charClass = new CharacterDAO();
    $selectedChars = $charClass->getGameChars($db, $gameID);


?>

<body>

    <div class="wrapper">
        <div class="delete-game-btn-container green">
            <button type="button" class="btn btn-danger delete-game-btn square-button">
                <span class="glyphicon glyphicon-trash"></span>
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
            <h1>Game Master's Portal</h1>
            <p>
                Welcome to the Game Master's Portal <?php echo $fname?>! Here you can edit the game you've created, add and
                delete players as well as plan your strategy for your epic quest.
            </p>
        </div>
    </div>

<main class="container-fluid wrapper">

    <div class="row">

        <!--LEFT SIDE FORM COLUMN-->
        <div class="col-md-4">

            <h2>Game Info</h2>

            <!--GAME NAME-->
                <form action="" method="get">
                    <label for="edit-game-name">Edit Game Name:</label>
                    <div class="input-group col-md-12">
                        <input type="text" class="form-control bigGameNameInput" placeholder="Search" value="<?= $gameName ?>" name="edit-game-name">
                        <div class="input-group-btn">
                            <button class="btn btn-primary bigGameNameInput-btn" type="submit">
                                <span class="glyphicon glyphicon-floppy-disk"></span>
                            </button>
                        </div>
                    </div>
                </form>

                <div class="gap-10px"></div>

            <!--SEARCH AND ADD PLAYERS-->

                <form action="" method="get">
                    <label for="edit-game-name">Search Players By Username:</label>
                    <div class="input-group col-md-12">
                        <input type="text" class="form-control portal-search-elements" name="gameName"/>
                        <div class="input-group-btn">
                            <button class="btn btn-primary square-button" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                            <button class="btn btn-primary square-button" type="submit">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>
                        </div>
                    </div>
                </form>

                <div class="gap-10px"></div>

            <!--MODIFY MAX PLAYERS-->

                <form action="" method="get">
                    <label for="gamePlayerTotal">Total Players Allowed:</label>
                        <select class="col-md-12 gamePlayerTotal" name="gamePlayerTotal">
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
                </form>

            <!--MAPS-->
            <label for="mapPanel">Change/Upload Current Map:</label>
            <div class="panel panel-default mapPanel">
                <div class="panel-body">
                    <div class="map-container">
                        <img src="Images/maps/map1.jpg" alt="map" class="map-image" style="width:100%">
                        <div class="map-middle">
                            <span class="map-cog glyphicon glyphicon-cog"></span>
                        </div>
                    </div>
                </div>
            </div>

            <!--CHARACTER LIST-->
            <h2>Selected Characters</h2>
            <div class="panel panel-default character-panel-gm">
                <div class="panel-body">
                    <div class="row all-avail-chars">
                        <?php foreach ($selectedChars as $char): ?>
                            <div class="col-sm-4 col-xs-6 character-thumb-container">
                                <label for="<?php echo $char->role_name ?>">
                                    <!-- <input class="character-chk" type="checkbox" name="availChars[]" value="<?php echo $char->role_id ?>" /> -->
                                    <img class="character-img" src="Images/<?php echo ($ruleBook == 1) ? "apocalypse" : "dungeon"; ?>-world-characters/<?php echo $char->picture; ?>" />
                                    <p><?php echo $char->role_name ?></p>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        </div> <!-- end of left side column -->

        <!--RIGHT SIDE COLUMN-->
        <div class="col-md-8">

            <h2>Player Info</h2>

            <div class="list-group-item active col-md-12">
                <h3>Players &nbsp;
                    <a href="#" data-toggle="tooltip" title="Click To Lock Game">
                        <button type="submit" class="btn btn-primary square-button">
                            <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                        </button>
                    </a>
                </h3>
            </div>

                    <div class="list-group">
                        <div class="list-group-item player-info-table">

                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#1" class="tab-links" data-toggle="tab">Current Players</a></li>
                                <li><a class="tab-links" href="#2" data-toggle="tab">Requests &amp; Invites</a></li>
                            </ul>
                            <div class = tab-content>
                                <div class="tab-pane active" id="1">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th>Username</th>
                                            <th>Character Name (View/Edit Stats)</th>
                                            <th>Character</th>
                                        </tr>
                                        </thead>


                                        <tbody id="playerList">



                                        </tbody>


                                    </table>
                                </div> <!--end tab 1 content-->
                                <div class="tab-pane" id="2">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th>Username</th>
                                        </tr>
                                        </thead>


                                        <tbody id="pending">




                                        </tbody>


                                    </table>
                                </div><!--end of tab 2 content-->
                            </div> <!--end of tab content-->
                        </div><!--end of list-group-item-->
                    </div><!--end of list-group-->



        <!--NOTES AND NOTICES-->

            <h2>notes &amp; notices</h2>
            <div class="panel panel-default">
                <div class="panel-body">

                    <!--TABS-->

                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#1" class="tab-links" data-toggle="tab">Notes</a></li>
                            <li><a class="tab-links" href="#2" data-toggle="tab">Notices</a></li>
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
                            <div class="tab-pane" id="2">
                                <div class="form-group">
                                    <div class="gap-10px"></div>
                                    <label for="comment">This will be seen by all players:</label>
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

    </div><!--end of row-->

    <div class="gap-10px"></div>
    <div class="gap-10px"></div>
    <a href="game-room.php"><button type="button" class="btn btn-primary go-to-game-btn">Go To Game!&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-right"></span><span class="glyphicon glyphicon-chevron-right"></span></button></a>


</main>
    <script type="text/javascript" src="Script/GM.js"></script>

<?php include "View/Footer.php"; ?>
