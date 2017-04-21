<?php

class GameDAO
{

    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    //CREATE GAME

    public function CREATE_Game($ruleBook, $gameName, $gameLanguage, $gamePlayerTotal)
    {
        $sql = "INSERT INTO games (rb_id, game_name, lang, max_players, game_status) VALUES (:rb_id, :game_name, :lang, :max_players, :game_status)";
        $stm = $this->db->prepare($sql);
        $stm->bindValue(':rb_id', $ruleBook, PDO::PARAM_STR); //apocalypseworld = 1, dungeonworld = 2
        $stm->bindValue(':game_name', $gameName, PDO::PARAM_STR);
        $stm->bindValue(':lang', $gameLanguage, PDO::PARAM_STR);
        $stm->bindValue(':max_players', $gamePlayerTotal, PDO::PARAM_STR);
        $stm->bindValue(':game_status', 1, PDO::PARAM_STR); //game_status 1 = open
        $result = $stm->execute();
        return $result;

    }

    //READ FROM GAMES TABLE

    public function READ_GameDetails($gameName){

        $sql = "SELECT * FROM games WHERE game_name = :gameName";

        $stm = $this->db->prepare($sql);
        $stm->bindValue(':gameName', $gameName, PDO::PARAM_STR);
        $stm->execute();
        $gameDetails = $stm->fetch();
        return $gameDetails;

    }

    //GET GAME NAME

    public function READ_GameName($gameID){

        $sql = "SELECT game_name FROM games WHERE id = :gameID";

        $stm = $this->db->prepare($sql);
        $stm->bindValue(':gameID', $gameID, PDO::PARAM_STR);
        $stm->execute();
        $gameName = $stm->fetch();
        return $gameName;

    }

    //UPDATE GAME NAME

    public function UPDATE_GameName($gameID, $newGameName){

        $sql = "UPDATE games
                SET game_name = '$newGameName'
                WHERE id = :gameID";
        $stm = $this->db->prepare($sql);
        $stm->bindValue(':gameID', $gameID, PDO::PARAM_STR);
        $result = $stm->execute();

    }

    //CREATE USER GAME NEW

    public function CREATE_UserGame($userID, $gameID, $notice){

        $sql = "INSERT INTO user_games (user_id, games_id, permission, player_status, notes, notices)
                VALUES (:user_id, :games_id, :permission, :player_status, :notes, :notices)";

        $stm = $this->db->prepare($sql);
        $stm->bindValue(':user_id', $userID, PDO::PARAM_STR);
        $stm->bindValue(':games_id', $gameID, PDO::PARAM_STR);
        $stm->bindValue(':permission', 1, PDO::PARAM_STR); //1 = gm
        $stm->bindValue(':player_status', 1, PDO::PARAM_STR); //1 = accepted
        $stm->bindValue(':notes', 'this is a note', PDO::PARAM_STR);
        $stm->bindValue(':notices', $notice, PDO::PARAM_STR);
        $result =$stm->execute();
        return $result;

    }

    //READ USER GAME TABLE

    public function READ_UserGameDetails($userID, $gameID){

        $sql = "SELECT * FROM user_games WHERE user_id = :user_id AND games_id = :game_id";

        $stm = $this->db->prepare($sql);
        $stm->bindValue(':user_id', $userID);
        $stm->bindValue(':game_id', $gameID);
        $stm->execute();
        $userGameDetails = $stm->fetchAll();
        return $userGameDetails;

    }

    //CHECK FOR DUPLICATE GAME NAME

    public function READ_CheckDuplicateGame($gameName){

        $sql = "SELECT * FROM games WHERE game_name = :gameName";

        $stm = $this->db->prepare($sql);
        $stm->bindValue(':gameName', $gameName, PDO::PARAM_STR);
        $stm->execute();
        $duplicateValuesCheck = $stm->fetch();

        if(!empty($duplicateValuesCheck)){
            return false;
        } else {
            return true;
        }

    }


}
