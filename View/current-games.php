<?php
require_once 'Models/database.php';
require_once 'Models/game.php';
require_once 'Models/query-game.php';

$db = new Database();
$pdo = $db->getDb();

$userId = 17;
$gameClass = new QueryGame();

$roomId = $gameClass->getGameRoomid($pdo, $userId);

?>
<tbody>	
							
<?php 
    foreach($roomId as $rvalue){
        
        //$test = '<a href="player-portal.php?' .$rvalue->id . '" name="game-portal">';
        
        //var_dump($test);
        
        $usergames = $gameClass->getAllUserGames($pdo, $rvalue->id);
        
        foreach ($usergames as $value){
        
        $status = $value->game_status;
      
        switch($status){
     
        case 1:
        $img = '<img class="access-colours" src="status-colours/access-granted.svg" alt="acess granted"/>';
        break;
    
        case 2:
        $img = '<img class="access-colours" src="status-colours/access-denied.svg" alt="access denied" />';
        break;
        
        
        case 3:
        $img = '<img class="access-colours" src="status-colours/access-locked.svg" alt="access locked" />';
        break;
        
        
        case 4:
        $img = '<img class="access-colours" src="status-colours/access-searching.svg" alt="access searching"/>';
        break;
        
    
        case 5:
        $img = '<img class="access-colours" src="status-colours/invite-pending.svg" alt="invite-pending" />';
        break;
        
    
        case 6:
        $img = '<img class="access-colours" src="status-colours/request-pending.svg" alt="request-pending" />';
        break;
        }

        echo "<tr id='" . $rvalue->id. "'>". "<td>" . $img . "</td>" . "<td>" . $value->game_name . "</td>" ."<td>" . $value->user_name . "</td>" ."<td>" . $value->lang . "</td>" ."<td>" . $value->max_players . "</td>" . "<td>" . $value->name . "</td>" . "</tr>";
    }   
}  
?>
</tbody>
</table>