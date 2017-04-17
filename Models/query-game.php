<?php
require_once 'game.php';
require_once 'database.php';

class QueryGame
{    

    public function getGameRoomid($pdo, $userId)
    {
        $sql = "SELECT DISTINCT games.id FROM games JOIN user_games ON games.id = user_games.games_id JOIN users ON user_games.user_id = users.id WHERE users.id = :user_id";
        $pdostmt = $pdo->prepare($sql);
        $pdostmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $pdostmt->execute();
        $gameRoomId = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $gameRoomId;
    }
    
    public function getAllUserGames($pdo, $gameId) 
    {
        $sql = "SELECT DISTINCT games.game_status, user_name, rulebooks.name, games.game_name, games.max_players, games.lang, games.rb_id FROM games JOIN user_games ON games.id = user_games.games_id JOIN users ON users.id = user_games.user_id JOIN rulebooks ON games.rb_id = rulebooks.id WHERE games.id = :gameId AND user_games.permission = 1";
        $pdostmt = $pdo->prepare($sql);
        $pdostmt->bindValue(':gameId', $gameId, PDO::PARAM_INT);
        $pdostmt->execute();
        $userspecificgames = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $userspecificgames;
    }

}

?>
