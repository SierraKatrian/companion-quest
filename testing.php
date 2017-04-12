<?php
/**
 * Created by PhpStorm.
 * User: jessmount
 * Date: 2017-04-11
 * Time: 5:27 PM
 */

include 'View/Header.php';

?>

<style>.list-group{float: left;}</style>


<div class="list-group">
    <div class="list-group-item player-info-table">

        <ul class="nav nav-tabs">
            <li class="active"><a href="#1" class="tab-links" data-toggle="tab">Current Players</a></li>
            <li><a class="tab-links" href="#2" data-toggle="tab">Requests & Invites</a></li>
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



<script src="Script/GM.js"></script>