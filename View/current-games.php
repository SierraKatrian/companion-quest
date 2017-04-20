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
    <?php if ($games->player_status == 1): ?>
    <tr>
        <td><img class="access-colours" src="Images/status-colours/<?php echo ($games->permission == 1) ? "gm.svg" : "access-granted.svg" ?>" alt="<?php echo ($games->permission == 1) ? "Game Master Status" : "Player Status" ?>"></td>
        <td><?php echo $games->game_name ?></td>
        <!-- <td><?php echo ($games->permission == 1) ? $games->user_name : ""?></td> -->
        <td><?php echo $games->lang ?></td>
        <td><?php echo $games->max_players ?></td>
        <td><?php echo $games->name ?></td>
        <td>
            <form action='Models/sessionredirect.php' method='post'>
                <input type='hidden' name='room_id' value=<?php echo $games->games_id ?> >
                <button class="btn btn-primary" type="submit" name="enter_game" value="<?php echo $games->games_id ?>">Go to game</button>
            </form>
        </td>
    </tr>
    <?php endif; ?>
<?php endforeach; ?>
