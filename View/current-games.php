<?php
require_once 'Models/DbConnect.php';
require_once 'Models/game.php';
require_once 'Models/query-game.php';


$dbClass = new DbConnect();
$db = $dbClass->getDB();

$gameClass = new QueryGame();
$roomId = $gameClass->getGameRoomid($db, $userId);

?>
<tbody>							
<?php 
    foreach($roomId as $rvalue){
        
        $usergames = $gameClass->getAllUserGames($db, $rvalue->id);
        
        foreach ($usergames as $value){
        
        $status = $value->player_status;
      
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

        echo "<tr>" . "<td>" . $img . "</td>" . "<td>" . $value->game_name . "</td>" ."<td>" . $value->user_name . "</td>" ."<td>" . $value->lang . "</td>" ."<td>" . $value->max_players . "</td>" . "<td>" . $value->name . "</td>" . "<td>" . "<form action='player-portal.php' method='post'><button id='game_portal'" . "type='submit' name='games_portal' value='" . $rvalue->id . "'>Go to game portal</button></form>". "</td>". "</tr>";
    }   
}
?>
</tbody>
</table>
