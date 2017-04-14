<?php
var_dump($userID, $username);
var_dump($gameID);

?>

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

        <!--SEARCH AND ADD PLAYERS-->

        <!--MODIFY MAX PLAYERS-->

            <div>
                  <label for="gamePlayerTotal">Total Players Allowed:</label>
                  <div class="gamePlayerTotal">
                      <?= $gamePlayerTotal ?>
                  </div>
            </div>

        <!--MAPS-->

        <label for="mapPanel">View Current Map:</label>
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

    </div><!--end of column-->

    <!--RIGHT SIDE FORM COLUMN-->

    <div class="col-md-8">

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
                        <th>Character Name (View/Edit Stats)</th>
                        <th>Character</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td>
                            <a href="#" data-toggle="tooltip" data-placement="right" title="game master">
                                <img class="access-colours" src="./Images/status-colours/gm.svg" alt="grand master" />
                            </a>
                                <?= "GM" ?>
                        </td>
                        <td><?= $username ?></td>
                        <td><a href="#"></td>
                        <td>
                            <?= "" ?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <a href="#" data-toggle="tooltip" data-placement="right" title="access granted">
                                <img class="access-colours" src="./Images/status-colours/access-granted.svg" alt="access granted" />
                            </a>
                                <?= "Active" ?>
                        </td>
                        <td>SecretPeter</td>
                        <td>Berty_Pep-Pep</td>
                        <td>
                            <?= "Battlebabe" ?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <a href="#" data-toggle="tooltip" data-placement="right" title="access granted">
                                <img class="access-colours" src="./Images/status-colours/request-pending.svg" alt="access granted" />
                            </a>
                                <?= "Request" ?>
                        </td>
                        <td>BerylPenn</td>

                        <td>CharlieCheesecakes</td>
                        <td>
                            <?= "Driver" ?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <a class="" href="#" data-toggle="tooltip" data-placement="right" title="invite pending">
                                <img class="access-colours" src="./Images/status-colours/invite-pending.svg" alt="invite pending" />
                            </a>
                                <?= "Invited" ?>
                        </td>
                        <td>Mandy123</td>
                        <td></td>
                        <td>
                            <?= "" ?>
                        </td>
                    </tr>

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

</div><!--end of row-->
