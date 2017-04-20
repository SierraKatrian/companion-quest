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
$ruleBook = $_SESSION['games']['rb_id'];
$ruleBookName = $_SESSION['games']['name'];
$gameID = $_SESSION['games']['games_id'];
$gameName = $_SESSION['games']['game_name'];
$gameLanguage = $_SESSION['games']['lang'];
$gamePlayerTotal = $_SESSION['games']['max_players'];
$gameStatus = $_SESSION['games']['game_status'];
$userOrGM = $_SESSION['games']['permission'];

$charID = $_SESSION['characters']['id'];
$roleID = $_SESSION['characters']['role_id'];

// var_dump($_SESSION['games']);
// echo '<br/>    User ID: ' . $userID;
// echo '<br/>    Char ID: ' . $charID;
// echo '<br/>     Role ID: ' . $roleID;

 ?>

<main>
    <div class="wrapper container-fluid">
    <div class="row">
        <div class="col-md-8">

          <!--MAP-->

          <script type="text/javascript" src="Script/Maps/game-page-image-load.js"></script>

          <div class="panel panel-default map_view">
              <section class="panel-body game-room-map">
                  <button type="submit" name="edit-map" id="edit-image-panel" data-toggle='modal' data-target='#gm-portal-maps' class="btn btn-primary square-button edit-map-btn" title="Edit Map">
                      <span class="glyphicon glyphicon-edit"></span>
                  </button>
                  <div id="game-room-map-image">
                    <img src="Images/maps/default-map.png" alt="map" class="map-image default-map-image game-room-map-img" style="width:100%">
                  </div>
              </section>
          </div>

          <!---->

            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <section class="notes_notices panel-body">
                        <ul class="nav nav-tabs">
                          <li class="active"><a data-toggle="tab" href="#notices">Notices</a></li>
                          <li><a data-toggle="tab" href="#notes">Notes</a></li>
                        </ul>

                        <div class="tab-content">
                          <div id="notices" class="tab-pane fade in active">
                            <?php
                            echo "This is where the notices will be located.";

                            ?>
                          </div>
                          <div id="notes" class="tab-pane fade">
                            <form class="" action="#" method="post">
                                <label for="notes"></label>
                                <textarea name="notes" rows="5" cols="80"></textarea>
                                <button type="submit" name="button">Save</button>
                            </form>
                          </div>
                        </div>
                    </section>
                </div>
                </div>

                <div class="col-md-4">
                    <div class="panel panel-default">
                        <section class="panel-body dice_roller">
                            <?php require_once 'View/Dice-Roller.php'; ?>
                        </section>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">

            <section class="panel-body game_info">
                <div class="backPortal">
                    <form class="" action="Models/return-to-portal.php" method="post">
                        <button class="btn button-default btn-block" type="submit" name="btn_back_portal">Go back to the Portal</button>
                    </form>
                </div>
                <h2><?php echo $gameName ?></h2>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Status</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Role</th>
                    </tr>
                    </thead>


                    <tbody>

                    <?php include 'Models/invitesList.php' ?>

                    </tbody>


                </table>
            </section>
            </div>
            <div class="panel panel-default">
            <section class="chat panel-body">
                <form class="chat_box" id="chat_box" action="" method="post">
                    <div id="chat-output"></div>
                    <textarea class="form-control" id="chat-input" name="name" rows="6" cols="80"></textarea>
                    <div class="chatButton">
                        <button class="btn btn-primary btn-chat" type="submit" name="btn_send">Send</button>
                    </div>
                </form>
            </section>
        </div>
    </div>

</div>

            <button class="slideout_btn rulebook_btn" type="button"><span class="glyphicon glyphicon-book glyphicon-inverse" aria-hidden="true"></span></button>

            <div class="slideout panel panel-default">
                <div class="panel-heading">
                    <h2><?php echo $ruleBookName; ?> - Rulebook <button type="button" class="close"><span class="glyphicon glyphicon-remove"></button></h2>
                    </div>
                <section class="panel-body">
                    <object width="100%" height="500" data="Files/apocalypseworld-rulebook.pdf"></object>
                </section>
            </div>

            <?php if ($userOrGM == 2): ?>
                <button class="slideout_btn charSheet_btn" type="button"><span class="glyphicon glyphicon-file glyphicon-inverse" aria-hidden="true"></span></button>

                <div class="slideout panel panel-default">
                    <div class="panel-heading">
                        <h2><?php echo $ruleBookName; ?> - Character Sheet <button type="button" class="close"><span class="glyphicon glyphicon-remove"></button></h2>
                    </div>
                    <section class="panel-body">
                        <?php include "View/Character-Sheet.php" ?>
                  </section>
                </div>
            <?php endif; ?>


</div>
</main>
<script type="text/javascript" src="Script/slide-out.js"></script>
<script type="text/javascript" src="Script/chat-ajax.js"></script>
<script type="text/javascript" src="Script/dice-roller.js"></script>

<!--MAP FILES-->
<script type="text/javascript" src="Script/Maps/page-load-map-functions.js"></script>
<script type="text/javascript" src="Script/Maps/populate-gallery-AJAX.js"></script>
<?php include "View/Modals/gmportal-maps.php"; ?>

<?php require_once 'View/footer.php'; ?>
<?php var_dump($_SESSION['game']) ?>
