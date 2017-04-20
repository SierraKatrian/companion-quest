<?php
    require_once "View/Header.php";

    $userDetails = $_SESSION['user'];

    $fname = $userDetails['f_name'];
    $lname = $userDetails['l_name'];
    $username = $userDetails['user_name'];
    $email = $userDetails['email'];
    $password = $userDetails['password'];
    $userId = $userDetails['id'];

?>

<body>

<div class="access-definitions-container affix-top" data-spy="affix" data-offset-top="70">
    <div class="row  wrapper">
        <div class="col-md-2 access-definitions">
            <img class="access-colours" src="./Images/status-colours/access-granted.svg" alt="access granted" /><span class="access-colours-text">&nbsp;access granted</span>
        </div>
        <div class="col-md-2 access-definitions">
            <img class="access-colours" src="./Images/status-colours/access-denied.svg" alt="access denied" /><span class="access-colours-text">&nbsp;access denied</span>
        </div>
        <div class="col-md-2 access-definitions">
            <img class="access-colours" src="./Images/status-colours/request-pending.svg" alt="request pending" /><span class="access-colours-text">&nbsp;pending request</span>
        </div>
        <div class="col-md-2 access-definitions">
            <img class="access-colours" src="./Images/status-colours/invite-pending.svg" alt="invite pending" /><span class="access-colours-text">&nbsp;pending invite</span>
        </div>
        <div class="col-md-2 access-definitions">
            <img class="access-colours" src="./Images/status-colours/access-searching.svg" alt="game open" /><span class="access-colours-text">&nbsp;game open</span>
        </div>
        <div class="col-md-2 access-definitions">
            <span class="glyphicon glyphicon-lock"></span><span class="access-colours-text">&nbsp;game locked</span>
        </div>
    </div>
</div>

<main class="wrapper">

    <div class="row green">

        <div class="col-md-12 red">
            <h1>Game Room</h1>
            <p>
                Welcome to the Game Room <?echo $fname?>! Here you can create or join a game. You can
                request to join current games, view pending requests or invites and
                search for available games. Enjoy your quest!
            </p>
        </div>

    </div><!--end of row-->

<!--START A QUEST-->

    <!--CREATE A GAME-->

    <h2>Start a quest!</h2>

    <div class="list-group-item active">
            <h3>Create A New Game</h3>
        </div>

        <div class="jumbotron create-game container-fluid">

            <div class="row main-portal-banner-content">

                <div class="col-md-12">
                    <h2>Be A Game Master</h2>
                    <p>Set your own rules and click here to start your very own Companion Quest!</p>
                </div>
                <a href="Create-A-Game.php"><button type="button" class="btn btn-primary">Create A Game!&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></button></a>

            </div><!--end of row-->

        </div>


    <!--CURRENT GAMES-->

        <div class="list-group-item active">
            <h3>View Current Games</h3>
        </div>

        <div class="list-group">
            <div class="list-group-item">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Status</th>
                        <th>Game Name</th>
                        <th>Games Master</th>
                        <th>Language</th>
                        <th>Players</th>
                        <th>Theme</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php include 'view/current-games.php' ?>
                    </tbody>
                </table>
            </div><!--end of list-group-item-->
        </div><!--end of list-group-->


    <!--JOIN A QUEST-->
    <h2>Join a quest!</h2>


    <div class="list-group-item active">
            <h3>Requests & Invites</h3>
        </div>

        <div class="list-group">
            <div class="list-group-item">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Status</th>
                        <th>Game Name</th>
                        <th>Games Master</th>
                        <th>Language</th>
                        <th>Players</th>
                        <th>Theme</th>
                    </tr>
                    </thead>
                    <tbody id = "invReq">
                    <?php include 'Models/playerRequests.php' ?>

                    </tbody>
                </table>
            </div><!--end of list-group-item-->
        </div><!--end of list-group-->


    <!--FIND A QUEST-->

    <h2>Find a quest!</h2>

    <form action="" method="get" name="advanced-search" id="searchroom" class="container-fluid find-a-game-form">
        <div class="row">
            <div class="col-md-5 find-a-quest-form-elements">
                <label for="gameName">Game Name:</label>
                <input type="text" class="form-control" id="gameName" name="gameName"/>
            </div>
            <div class="col-md-3 find-a-quest-form-elements">
                <label for="gametheme">Theme Preference:</label>
                <select name="gametheme" id="gametheme">
                    <option value="">-- Choose A Theme --</option>
                    <option value="Apocalypse World">Apocalypse World</option>
                    <option value="Dungeon World">Dungeon World</option>
                </select>
            </div>
            <div class="col-md-3 find-a-quest-form-elements">
                <label for="gamelanguage">Language:</label>
                <select name="gamelanguage" id="gamelanguage">
                    <option value="">-- Choose A Language --</option>
                    <option value="English">English</option>
                    <option value="French">French</option>
                    <option value="Spanish">Spanish</option>
                    <option value="Mandarin">Mandarin</option>
                    <option value="Arabic">Arabic</option>
                    <option value="Portuguese">Portuguese</option>
                    <option value="Hindi">Hindi</option>
                    <option value="Russian">Russian</option>
                    <option value="Japanese">Japanese</option>
                    <option value="Korean">Korean</option>
                </select>
            </div>
            <div class="col-md-1 find-a-quest-form-elements">
                <button type="submit" class="btn btn-primary find-a-quest-search-btn"><span class="glyphicon glyphicon-search"></span></button>
            </div>
        </div>
    </form>

    <div class="list-group-item active">
        <h3>Current Games</h3>
    </div>

    <div class="list-group">
        <div class="list-group-item">
            <table id="games" class="table table-hover">
                <thead>
                <tr>
                    <th>Status</th>
                    <th>Game Name</th>
                    <th>Games Master</th>
                    <th>Language</th>
                    <th>Players</th>
                    <th>Theme</th>
                    <th></th>
                </tr>
                </thead>
                <tbody id="search-output">
                </tbody>
            </table>
        </div><!--end of list-group-item-->
    </div><!--end of list-group-->

</main>
<script src="Script/joinReq.js"></script>
<script src="Script/getRoom-ajax.js"></script>
<script src="Script/acceptMain.js"></script>
<?php include "View/Footer.php"; ?>
