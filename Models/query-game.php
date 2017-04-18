<?php
require_once 'Models/game.php';
require_once 'Models/DbConnect.php';

class QueryGame
{    

    public function getGameRoomid($db, $userId)
    {
        $sql = "SELECT DISTINCT games.id FROM games JOIN user_games ON games.id = user_games.games_id JOIN users ON user_games.user_id = users.id WHERE users.id = :user_id";
        $pdostmt = $db->prepare($sql);
        $pdostmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $pdostmt->execute();
        $gameRoomId = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $gameRoomId;
    }
    
    public function getAllUserGames($db, $gameId) 
    {
        $sql = "SELECT DISTINCT user_games.player_status, user_name, rulebooks.name, games.game_name, games.max_players, games.lang, games.rb_id FROM games JOIN user_games ON games.id = user_games.games_id JOIN users ON users.id = user_games.user_id JOIN rulebooks ON games.rb_id = rulebooks.id WHERE games.id = :gameId AND user_games.permission = 1";
        $pdostmt = $db->prepare($sql);
        $pdostmt->bindValue(':gameId', $gameId, PDO::PARAM_INT);
        $pdostmt->execute();
        $userspecificgames = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $userspecificgames;
    }

}

?>
