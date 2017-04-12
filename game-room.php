<?php require_once 'View/header.php'; ?>
<?php $_SESSION['game']= 1; ?>
<head>

</head>
    <link rel="stylesheet" href="Style/global.css">
    <script src="Script/slide-out.js"></script>
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
                <form class="chat_box" id="chat_box" action="" method="post">
                    <div id="chat-output"></div>
                    <textarea id="chat-input" name="name" rows="6" cols="80"></textarea>
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
<script type="text/javascript" src="Script/slide-out.js"></script>
<script type="text/javascript" src="Script/chat-ajax.js"></script>
<?php require_once 'View/footer.php'; ?>
<?php var_dump($_SESSION['game']) ?>
