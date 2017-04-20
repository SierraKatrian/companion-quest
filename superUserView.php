<?php
/**
 * Created by PhpStorm.
 * User: jessmount
 * Date: 2017-04-19
 * Time: 7:26 PM
 */

include "View/Header.php";

?>
<body>
<div class="wrapper">

    <main>

    <h2>Edit Users</h2>

    <div class="list-group-item active col-md-12">
        <h3>Users</h3>
    </div>

    <div class="list-group">
        <div class="list-group-item player-info-table">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Permissions</th>
                    <th></th>
                    <th></th>

                </tr>
                </thead>
                <tbody id = "user_table">
                    <?php include "Models/getAllUsers.php" ?>


                </tbody>
            </table>
        </div><!--end of list-group-item-->
    </div><!--end of list-group-->

    </main>
</div>
<script src="Script/superUser.js"></script>
</body>


















<?php include "View/Footer.php";
