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
        $query = "INSERT INTO user_games (user_id, games_id, permission, player_status, notes_id, notices) 
                  VALUES (:user_id, :games_id, 1,3, 1, 'New Player Added')";
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
                  JOIN characters ON characters.games_id = user_games.games_id
                  JOIN roles ON roles.roles_id = characters.roles_id
                  WHERE user_games.games_id = :game_id AND characters.users_id = user_games.user_id AND user_games.player_status = 1 ";
        $statement = $db->prepare($query);
        $statement->bindValue(':game_id', $game_id);
        $statement->execute();
        $playersInGame = $statement->fetchAll();

        return $playersInGame;
    }

    public function listPendingPlayers ($db, $game_id) {
        $query = "SELECT user_games.*, users.user_name FROM user_games
                  JOIN users ON user_games.user_id = users.id
                  WHERE user_games.games_id = :game_id AND user_games.player_status = 3 OR user_games.player_status = 4";
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

        $newGM = $this->gmPermissions($db,$NextGM, $gameId);

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
}