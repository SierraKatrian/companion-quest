<?php
require_once './Models/game.php';
require_once './Models/query-game.php';


$dbClass = new DbConnect();
$db = $dbClass->getDB();

//User details
$userDetails = $_SESSION['user'];

$userID = $userDetails['id'];
$fname = $userDetails['f_name'];
$lname = $userDetails['l_name'];
$username = $userDetails['user_name'];
$email = $userDetails['email'];
$password = $userDetails['password'];

$gameClass = new QueryGame();
// $gameID = $gameClass->getGameRoomid($db, $userID);

// $allUserGames = $gameClass->getAllUserGames($db, $gameId);
// $gamePerms = $gameClass->getGamePermissions($db, $userId, $gameId);

$getAllGames = $gameClass->getAllGames($db, $userID);

// var_dump($gameID);
// var_dump($allUserGames);
// var_dump($gamePerms);

?>
    <?php foreach ($getAllGames as $games): ?>
<img src="" alt="">
        <tr>
            <td><img class="access-colours" src="Images/status-colours/<?php echo ($games->permission == 1) ? "gm.svg" : "access-granted.svg" ?>" alt="<?php echo ($games->permission == 1) ? "Game Master Status" : "Player Status" ?>"></td>
            <td><?php echo $games->game_name ?></td>
            <td><?php echo ($games->permission == 1) ? $games->user_name : ""?></td>
            <td><?php echo $games->lang ?></td>
            <td><?php echo $games->max_players ?></td>
            <td><?php echo $games->name ?></td>
            <td>
                <form action='Models/sessionredirect.php' method='post'>
                    <input type='hidden' name='room_id' value=<?php echo $games->games_id ?> >
                    <button type="submit" name="enter_game" value="<?php echo $games->games_id ?>">Go to game: <?php echo $games->games_id ?>
                    </button>
                </form>
            </td>
        </tr>

    <?php endforeach; ?>
<?php


//
// //--------foreach of the Game Room Id query function---------------------------------------------------
//     foreach($roomId as $rvalue){
//
//         //user games query in Game Class passing in roomId
//         $usergames = $gameClass->getAllUserGames($db, $rvalue->id);
//         $gamePerm = $gameClass->getGamePermissions($db, $userId, $rvalue->id);
//
//
// //--------foreach of the Games User Permissions----------------------------------------------------------
//
//        foreach ($gamePerm as $pvalue){
//         $perm = $pvalue->permission;
//
//         //switch for form action when click to enter game
//         /*switch($href){
//
//         case 1:
//         $href = "<form action='GM-Portal.php' method='post'>";
//         break;
//
//         case 2:
//         $href = "<form action='Player-Portal.php' method='post'>";
//         break;
//         }
//         */
//
//
//
//
// //-----for each of the usergames information that corresponds to each game in the foreach above--------
//     foreach ($usergames as $value) {
//
//         $status = $value->player_status;
//
//         //swith for possible status images
//         switch($status){
//
//         case 1:
//         $img = '<img class="access-colours" src="images/status-colours/access-granted.svg" alt="acess granted"/>';
//         break;
//
//         case 2:
//         $img = '<img class="access-colours" src="images/status-colours/access-denied.svg" alt="access denied" />';
//         break;
//
//
//         case 3:
//         $img = '<img class="access-colours" src="images/status-colours/access-locked.svg" alt="access locked" />';
//         break;
//
//
//         case 4:
//         $img = '<img class="access-colours" src="images/status-colours/access-searching.svg" alt="access searching"/>';
//         break;
//
//
//         case 5:
//         $img = '<img class="access-colours" src="images/status-colours/invite-pending.svg" alt="invite-pending" />';
//         break;
//
//
//         case 6:
//         $img = '<img class="access-colours" src="images/status-colours/request-pending.svg" alt="request-pending" />';
//         break;
//         }
//
//         // echo "<tr>" . "<td>" . $img . "</td>" . "<td>" . $value->game_name . "</td>" ."<td>" . $value->user_name . "</td>" ."<td>" . $value->lang . "</td>" ."<td>" . $value->max_players . "</td>" . "<td>" . $value->name . "</td>" . "<td>" . "<form action='Models/sessionredirect.php' method='post'>" . "<input type='text' style='display: none' value='roomid' name='" . $value->$rvalue->id . "'>" .$rvalue->id . "<input type='text' style='display: none' name='roomid' value='" . $value->game_name . "'>". "<button id='game_portal' type='submit' name='games_portal' value='" . "<input type='text' style='display: none' value='roomid' name='" . $value->$rvalue->id . "'>" .$rvalue->id . "<input type='text' style='display: none' name='roomid' value='" . $value->game_name . "'>" . $value->game_name . "^" . $value->lang . $value->max_players . $value->name . $pvalue->permission . "' class = 'btn btn-primary'>Go to game portal</button></form>". "</td>". "</tr>";
//
//         }
//
//       }
//     }
?>
