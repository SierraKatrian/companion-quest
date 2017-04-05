<?php require_once 'header2.php'; ?>

<head>
    
</head>
    <link rel="stylesheet" href="css/game-room.css">
    <script src="js/slide-out.js"></script>
<main>
    <div class="wrapper container-fluid">
    <div class="row">
        <div class="col-md-9">

            <div class="panel panel-default">
                <section class="panel-body map_view">
                    <img class="map_image" src="img/map.jpg" alt="image of a map">
                </section>
            </div>

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

                            //if permission = GM display
                            // <form class="" action="#" method="post">
                            //     <label for="notes">Notes</label>
                            //     <textarea name="notes" rows="8" cols="80"></textarea>
                            // </form>

                            // if permission = PC display
                            // <div class="notice_board">

                            // </div>

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
                            <h1>This is where the dice roller will go</h1>
                        </section>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-default">

            <section class="panel-body game_info">
                <h2><?php echo "Game Name"; ?></h2>
                <ul>
                    <?php //foreach ($variable as $value) : ?>
                        <li><?php //list of players ?>list of players</li>
                        <li><?php //list of players ?>list of players</li>
                        <li><?php //list of players ?>list of players</li>
                        <li><?php //list of players ?>list of players</li>
                        <li><?php //list of players ?>list of players</li>
                    <?php //endforeach; ?>
                </ul>
            </section>
            </div>
            <div class="panel panel-default">
            <section class="chat panel-body">
                <form class="chat_box" action="" method="post">
                    <h2>This is where the chat will go.</h2>
                    <textarea name="name" rows="6" cols="80"></textarea>
                    <button type="submit" name="btn_send">Send</button>
                </form>
            </section>
        </div>
    </div>

</div>

            <button class="slideout_btn charSheet_btn" type="button"><span class="glyphicon glyphicon-file glyphicon-inverse" aria-hidden="true"></span></button>

            <div class="slideout panel panel-default">
                <section class="panel-body">
                    <button type="button" class="close"><span class="glyphicon glyphicon-remove"></button>
                    <div class="avatar">
                      <?php echo "this is where the avatar will show"; ?>
                    </div>
                    <?php echo "this is where the character sheet will show" ?>
              </section>
            </div>

        <button class="slideout_btn rulebook_btn" type="button"><span class="glyphicon glyphicon-book glyphicon-inverse" aria-hidden="true"></span></button>

        <div class="slideout panel panel-default">
            <section class="panel-body">
                <h3>Apacalypse World - Rulebook <button type="button" class="close"><span class="glyphicon glyphicon-remove"></button></h3>
                <object type="application/pdf" width="100%" height="100%" data="pdf/aw-rulebook.pdf"></object>
            </section>
        </div>

</div>
</main>
<script type="text/javascript" src="script/slide-out.js"></script>
<?php require_once 'footer.php'; ?>
