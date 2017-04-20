<?php

/**
 * Created by PhpStorm.
 * User: jessmount
 * Date: 2017-04-10
 * Time: 5:40 PM
 */
class playerPermissions
{

    public function getGameName ($db, $game_name){
        $query="SELECT id FROM games WHERE game_name = :game_name";
        $statement = $db->prepare($query);
        $statement->bindValue(':game_name', $game_name);
        $statement->execute();
        $name = $statement->fetch();

        return $name;
    }
    //need to determine notes Id?
    public function insertPending ($db, $user_id, $games_id ) {
        $query = "INSERT INTO user_games (user_id, games_id, permission, player_status, notes, notices) 
                  VALUES (:user_id, :games_id, 2,3, 'Welcome the Game!', 'New Player Added')";
        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $user_id);
        $statement->bindValue(':games_id', $games_id);
        //$statement->bindValue(':notes_id', $notes_id);
        $statement->execute();

        echo "Added successfully";

    }

    public function acceptRequest ($db, $user_id, $games_id){
        $query = "UPDATE user_games SET player_status = 1 WHERE user_id = :user_id AND games_id = :games_id";
        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $user_id);
        $statement->bindValue(':games_id', $games_id);
        $statement->execute();

        return true;
    }

    public function declineRequest ($db, $user_id, $games_id){
        $query = "UPDATE user_games SET player_status = 2 WHERE user_id = :user_id AND games_id = :games_id";
        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $user_id);
        $statement->bindValue(':games_id', $games_id);
        $statement->execute();

        return true;
    }

    public function listActivePlayers ($db, $game_id) {
        $query = "SELECT user_games.*, users.user_name, characters.name, roles.role_name FROM user_games
                  JOIN users ON user_games.user_id = users.id
                  JOIN characters ON characters.game_id = user_games.games_id
                  JOIN roles ON roles.roles_id = characters.role_id
                  WHERE user_games.games_id = :game_id AND characters.user_id = user_games.user_id AND user_games.player_status = 1 ";
        $statement = $db->prepare($query);
        $statement->bindValue(':game_id', $game_id);
        $statement->execute();
        $playersInGame = $statement->fetchAll();

        return $playersInGame;
    }

    public function listPendingPlayers ($db, $game_id) {
        $query = "SELECT user_games.*, users.user_name FROM user_games
                  JOIN users ON user_games.user_id = users.id
                  WHERE user_games.games_id = :game_id AND (user_games.player_status = 3 OR user_games.player_status = 4)";
        $statement = $db->prepare($query);
        $statement->bindValue(':game_id', $game_id);
        $statement->execute();
        $pendingPlayers = $statement->fetchAll();

        return $pendingPlayers;
    }

    public function removePlayer($db, $user_id, $game_id){
        $query = "DELETE FROM user_games WHERE user_id = :user_id AND games_id = :games_id";
        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $user_id);
        $statement->bindValue(':games_id', $game_id);
        $statement->execute();
    }

    public function changePermissions ($db, $currentGM, $NextGM, $gameId) {

        $oldGM = "UPDATE user_games SET permission = 1 WHERE user_id = :user_one AND games_id = :gameId";
        $statement = $db->prepare($oldGM);
        $statement->bindValue(':user_one', $currentGM);
        $statement->bindValue(':gameId', $gameId);
        $statement->execute();

       // $newGM = $this->gmPermissions($db,$NextGM, $gameId);

        echo "Permissions switched!";
    }

    public function gmPermissions ($db, $userID, $gameId) {

        $query = "UPDATE user_games SET permission = 2 WHERE user_id = :userID AND games_id = :gameId";
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        $statement->bindValue(':gameId', $gameId);
        $statement->execute();

        echo "Permissions Updated!";
    }

    public function getAllGamePlayers ($db, $game_id) {
        $query = "SELECT user_games.player_status, user_games.games_id, user_games.permission, users.user_name, characters.name, roles.role_name 
        FROM user_games JOIN users ON user_games.user_id = users.id 
        JOIN characters ON users.id = characters.user_id 
        JOIN roles ON roles.roles_id = characters.role_id
        WHERE user_games.games_id = :game_id AND player_status = 1 ORDER BY user_games.permission ASC";
        $statement = $db->prepare($query);
        $statement->bindValue(':game_id', $game_id);
        $statement->execute();
        $userInGame = $statement->fetchAll();

        return $userInGame;
    }

    public function getGameRoomid($pdo, $userId)
    {
        $sql = "SELECT DISTINCT games.id, user_games.player_status FROM games JOIN user_games ON games.id = user_games.games_id JOIN users ON user_games.user_id = users.id WHERE users.id = :user_id";
        $pdostmt = $pdo->prepare($sql);
        $pdostmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $pdostmt->execute();
        $gameRoomId = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $gameRoomId;
    }

    public function getAllUserGames($pdo, $gameId)
    {
        $sql = "SELECT DISTINCT user_games.player_status, user_name, games.game_name, games.max_players, games.lang, rulebooks.name FROM games JOIN user_games ON games.id = user_games.games_id JOIN users ON users.id = user_games.user_id 
              JOIN rulebooks ON games.rb_id = rulebooks.id WHERE games.id = :gameId AND user_games.permission = 1 
              ";
        $pdostmt = $pdo->prepare($sql);
        $pdostmt->bindValue(':gameId', $gameId, PDO::PARAM_INT);
        $pdostmt->execute();
        $userspecificgames = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $userspecificgames;
    }
}