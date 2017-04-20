<?php
//require_once 'Models/game.php';
//require_once 'Models/DbConnect.php';

class QueryGame
{
    public function getAllGames($db, $userID) {
        $sql = "SELECT DISTINCT user_games.*, games.*, users.*,
        rulebooks.*
        FROM user_games
        JOIN games ON games.id = user_games.games_id
        JOIN users ON users.id = user_games.user_id
        JOIN rulebooks ON rulebooks.id = games.rb_id
        WHERE user_id = :userID";
        $pdostmt = $db->prepare($sql);
        $pdostmt->bindValue(':userID', $userID, PDO::PARAM_INT);
        $pdostmt->execute();
        $gameRoomId = $pdostmt->fetchAll(PDO::FETCH_OBJ);

        return $gameRoomId;
    }

    public function getGameRoomid($db, $userId)
    {
        $sql = "SELECT DISTINCT games.id FROM games JOIN user_games ON games.id = user_games.games_id WHERE user_games.user_id = :user_id";
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

    public function getGamePermissions($db, $userId, $gameId)
    {
        $sql = "SELECT permission FROM user_games WHERE user_id = :user_id AND games_id = :gameId";
        $pdostmt = $db->prepare($sql);
        $pdostmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $pdostmt->bindValue(':gameId', $gameId, PDO::PARAM_INT);
        $pdostmt->execute();
        $permission = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $permission;
    }

    public function getGameSession ($db, $userid, $gameid) {
        $sql = "SELECT * 
                FROM games g JOIN rulebooks r ON g.rb_id = r.id JOIN user_games ug ON g.id = ug.games_id JOIN users u ON ug.user_id = u.id
                WHERE ug.user_id = :user_id AND ug.games_id = :gameId";
        $pdostmt = $db->prepare($sql);
        $pdostmt->bindValue(':user_id', $userid, PDO::PARAM_INT);
        $pdostmt->bindValue(':gameId', $gameid, PDO::PARAM_INT);
        $pdostmt->execute();
        $permission = $pdostmt->fetch(PDO::FETCH_ASSOC);
        return $permission;
    }

    public function getChatRoomId ($db, $gameid) {
        $sql = "SELECT id
                FROM chat_rooms
                WHERE game_id = :gameId";
        $pdostmt = $db->prepare($sql);
        $pdostmt->bindValue(':gameId', $gameid, PDO::PARAM_INT);
        $pdostmt->execute();
        $permission = $pdostmt->fetch(PDO::FETCH_ASSOC);
        return $permission;
    }
}

?>
