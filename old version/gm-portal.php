<!--Jessica Mount Friday, Feb 17th-->
<!--I changed the organization around slightly, feel free to change back if you don't agree:

        1. I placed the "change Permissions/Leave game" option in the "edit game settings" modal window.
        2. I took out the "view character list" from the modal window and added it to the players tabs.
-->

<!--Jessica Mount Friday, Feb 17th-->

<?php require_once 'header2.php'; ?>

<head>
    <link rel="stylesheet" href="css/main-portals.css">
</head>

<main class="">
    <div class="content-wrapper container-fluid portal-content">
    <div class="row main-row">
        <div class="col-md-6">
            <h2>Name_of_Game <span><button type="button" class="btn btn-default" data-toggle="modal" data-target="#editGame"><span class="glyphicon glyphicon-pencil"></span></button></span></h2>
            <!-- Trigger the modal with a button -->

            <div>
                <!-- Dungeon World Rulebook Modal -->

                <button type="button" class="btn btn-info btn-lg rulebook-modal-btn" data-toggle="modal" data-target="#DungeonModal"><span class="glyphicon glyphicon-file"></span>&nbsp;view rulebook</button>
                <button type="button" class="btn btn-info btn-lg maps-modal-btn" data-toggle="modal" data-target="#MapsModal"><i class="fa fa-map" aria-hidden="true"></i>&nbsp;view maps</button>

                <div id="DungeonModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3>Dungeon World Rulebook<button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button></h3>
                            </div>
                            <div class="modal-body">
                                <object width="100%" height="500" data="pdf/Dungeon-World-Rulebook.pdf"></object>
                            </div>
                        </div>
                    </div>
                </div> <!-- END of Dungeon World Rulebook Modal -->
                <div id="ApocalypseModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
                                <object width="100%" height="100%" data="pdf/aw-rulebook.pdf"></object>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--START PLAYERS TABS-->
            <section>
                <form class="form-group move-down">
                    <label for="find_players">Invite players...</label>
                    <input type="text" class="form-control invite-players-bar" name="find_players" placeholder="Search by username" />
                    <button class="btn btn-info move-down" type="button" name="button"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;&nbsp;Search</button>     
                </form>
                <div>
                    <h3>View Players</h3>
                    <div class="">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th>Username</th>
                                <th>Character</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php //foreach ($users as $user) : ?>
                            <tr>
                                <td>Active</td>
                                <td>PlayerNumberONE</td>
                                <td>Shmooly</td>
                                <td>
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="caret"></span>
                                      </button>
                                      <ul class="dropdown-menu">
                                        <li><a href="#">Accept</a></li>
                                        <li><a href="#">Decline</a></li>
                                        <li><a href="#">Delete</a></li>
                                      </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php //endforeach; ?>
                        </tbody>
                    </table>
                </div>
                </div>
                <div>
                    <h3>View Character List</h3>
                    <form>
                        <label for="bb">Battle Babe</label>
                        <input type="checkbox" name="bb" checked />
                        <label for="angel">Angel</label>
                        <input type="checkbox" name="angel" />
                        <button class="btn btn-default" type="button" name="button">Update</button>
                    </form>
                </div>
            </section>
        <!--END PLAYERS TABS-->

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

        <!-- Modal -->
        <div id="editGame" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="edit-game modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
              </div>
              <div class="modal-body">
                  <form class="form-horizontal">
                      <div class="form-group">
                          <label class="control-label col-md-3" for="name">New Name:</label>
                          <div class="form-inline col-md-9">
                            <input class="form-control" type="text" />
                            <button class="btn btn-default" type="submit" name="button">Change Game Name</button>
                            </div>
                      </div>
                  </form>
                  <form class="form-horizontal">
                      <div class="form-group">
                      <label class="control-label col-md-3" for="theme">Choose Theme:</label>
                      <div class="form-inline col-md-9">
                      <select>
                          <option>--</option>
                          <option>Apocalypse World</option>
                          <option>Dungeon World</option>
                       </select>
                      <button class="btn btn-default" type="submit" name="button">Change Rulebook</button>
                  </div>
                  </div>
                  </form>
                  <form class="form-horizontal">
                      <div class="form-group">
                      <label class="control-label col-md-3" for="lang">Choose Language</label>
                      <div class="form-inline col-md-9">
                      <select>
                          <option>--</option>
                          <option>English</option>
                          <option>French</option>
                      </select>
                      <button class="btn btn-default" type="submit" name="button">Change Language</button>
                  </div>
              </div>
                  </form>
                  <form class="form-horizontal">
                      <div class="form-group">
                      <p>Leave Game?</p>
                      <p>If you'd like to step down as Game Master, you'll first need to find someone worthy of taking over this great responsiblity. Please send a Game Master request to a fellow player. If they accept, then duties will be switched automatically.</p>
                      <label class="control-label col-md-3" for="name">New Game Master:</label>
                      <div class="form-inline col-md-9">
                      <input type="text" name="newuser" placeholder="Enter username"/>
                      <button class="btn btn-default" type="submit" name="button">Send Request</button>
                  </div>
                  </div>
                  </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>
    </div>
</main>
</div>
<?php require_once 'footer.php'; ?>
