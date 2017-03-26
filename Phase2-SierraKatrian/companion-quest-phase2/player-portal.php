
<?php require_once 'view/header2.php'; ?>

<head>
    <link rel="stylesheet" href="style/main-portals.css">
</head>

<div class="content-wrapper">
<main class="container-fluid">
    <div class="row main-row">
        <div class="col-md-6">
            <h2><?php echo "name of game"; ?></h2>

            <div>
                <!-- Dungeon World Rulebook Modal -->

                <button type="button" class="btn btn-info btn-lg rulebook-modal-btn" data-toggle="modal" data-target="#DungeonModal"><span class="glyphicon glyphicon-file"></span>&nbsp;view rulebook</button>

                <div id="DungeonModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3>Dungeon World Rulebook<button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button></h3>
                            </div>
                            <div class="modal-body">
                                <object width="100%" height="500" data="files/Dungeon-World-Rulebook.pdf"></object>
                            </div>
                        </div>
                    </div>
                </div> <!-- END of Dungeon World Rulebook Modal -->
                <div id="ApocalypseModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
                                <object width="100%" height="100%" data="files/aw-rulebook.pdf"></object>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--PROFLE PICTURE-->
            <div id="profle_pic">
                <img src="<?php //get URL for img ?>" alt="profile picture" name="profilePic" /><p>Upload profile picture...</p>
                <form class="" action="" method="post">
                    <label for="avatar">Upload Avatar</label>
                    <span class="btn btn-default btn-file">
                        Browse <input type="file">
                    </span>
                    <button class="btn btn-default" type="submit" name="button">Save Avatar</button>
                </form>
            </div>
            <!--END PROFILE PICTURE-->
            <section>
                <div>
                    <h3>List of Players</h3>
                    <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Character</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php //foreach ($users as $user) : ?>
                            <tr>
                                <td>PlayerNumberONE</td>
                                <td>Shmooly</td>
                            </tr>
                            <?php //endforeach; ?>
                        </tbody>
                    </table>
                </div>
                </div>
            </section>
        </div>

        <div class="col-md-6">
            <!--START MESSAGES TABS-->
                <section>
                    <div class="panel panel-default">
                        <section class="panel-body">
                        <ul class="nav nav-tabs">
                          <li class="active"><a data-toggle="tab" href="#notes" class="tab-links">Notes</a></li>
                          <li><a data-toggle="tab" href="#notices"  class="tab-links">Notices</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="notes" class="tab-pane fade in active">
                              <form class="" action="#" method="post">
                                  <label for="notes"></label>
                                  <textarea name="notes" rows="15" cols="80"></textarea>
                                  <button class="btn btn-default" type="submit" name="button">Save Notes</button>
                              </form>
                            </div>

                            <div id="notices" class="tab-pane fade">
                                <form class="" action="#" method="post">
                                    <label for="notices"></label>
                                    <textarea name="notices" rows="15" cols="80"></textarea>
                                    <button class="btn btn-default" type="submit" name="button">Save Notices</button>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
                </section>
            <!--END MESSAGES TABS-->
                <a href="game-room.php"><button type="button" class="btn btn-primary go-to-game">Go to Game&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></button></a>
        </div>
    </div>
</main>
</div>
<?php require_once 'view/footer.php'; ?>
