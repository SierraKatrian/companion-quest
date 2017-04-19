<?php
require_once 'Models/DbConnect.php';
require_once 'Models/game.php';
require_once 'Models/query-game.php';


$dbClass = new DbConnect();
$db = $dbClass->getDB();

$userId = $_SESSION['user']['id'];

$gameClass = new QueryGame();
$roomId = $gameClass->getGameRoomid($db, $userId);

?>
 <table class="table table-hover">
<thead>
    <tr>
    <th>Status</th>
    <th>Game Name</th>
    <th>Games Master</th>
    <th>Language</th>
    <th>Players</th>
    <th>Theme</th>
    <th></th>
    </tr>
</thead>
<tbody>							
<?php 
    
//--------foreach of the Game Room Id query function---------------------------------------------------
    foreach($roomId as $rvalue){
        
        //user games query in Game Class passing in roomId
        $usergames = $gameClass->getAllUserGames($db, $rvalue->id);
        $gamePerm = $gameClass->getGamePermissions($db, $userId, $rvalue->id);
        
        
//--------foreach of the Games User Permissions----------------------------------------------------------     
        
       foreach ($gamePerm as $pvalue){
        $href = $pvalue->permission;
      
        //switch for form action when click to enter game
        switch($href){
        
        case 1:
        $href = "<form action='GM-Portal.php' method='post'>";
        break;
                
        case 2:
        $href = "<form action='Player-Portal.php' method='post'>";
        break;
        }
    
        
        
//-----for each of the usergames information that corresponds to each game in the foreach above--------
    foreach ($usergames as $value){
        
        $status = $value->player_status;
      
        //swith for possible status images
        switch($status){
     
        case 1:
        $img = '<img class="access-colours" src="images/status-colours/access-granted.svg" alt="acess granted"/>';
        break;
    
        case 2:
        $img = '<img class="access-colours" src="images/status-colours/access-denied.svg" alt="access denied" />';
        break;
        
        
        case 3:
        $img = '<img class="access-colours" src="images/status-colours/access-locked.svg" alt="access locked" />';
        break;
        
        
        case 4:
        $img = '<img class="access-colours" src="images/status-colours/access-searching.svg" alt="access searching"/>';
        break;
        
    
        case 5:
        $img = '<img class="access-colours" src="images/status-colours/invite-pending.svg" alt="invite-pending" />';
        break;
        
    
        case 6:
        $img = '<img class="access-colours" src="images/status-colours/request-pending.svg" alt="request-pending" />';
        break;
        }
        
        echo "<tr>" . "<td>" . $img . "</td>" . "<td>" . $value->game_name . "</td>" ."<td>" . $value->user_name . "</td>" ."<td>" . $value->lang . "</td>" ."<td>" . $value->max_players . "</td>" . "<td>" . $value->name . "</td>" . "<td>" . $href . "<button id='game_portal' type='submit' name='games_portal' value='" . $rvalue->id . "' class = 'btn btn-primary'>Go to game portal</button></form>". "</td>". "</tr>";
        
        }
        
    }
}
?>
</tbody>
</table>
