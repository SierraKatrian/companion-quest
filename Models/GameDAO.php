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

    //CREATE USER GAME TEST

//    public function CREATE_UserGame($userID, $gamesID, $notice){
//
//        //(SELECT id FROM games WHERE game_name = $gameName)
//
//        $sql = "INSERT INTO user_games (user_id, games_id, permission, player_status, notes_id, notices)
//                VALUES (:user_id, :games_id, :permission, :player_status, :notes_id, :notices)";
//
//        $stm = $this->db->prepare($sql);
//        $stm->bindValue(':user_id', $userID, PDO::PARAM_STR);
//        $stm->bindValue(':games_id',$gamesID);
//        $stm->bindValue(':permission', '2', PDO::PARAM_STR); // 2 = gm
//        $stm->bindValue(':player_status', 1, PDO::PARAM_STR); //1 = accepted
//        $stm->bindValue(':notes_id', 'write your note here', PDO::PARAM_STR); //
//        $stm->bindValue(':notices', $notice, PDO::PARAM_STR); //
//        $result =$stm->execute();
//        return $result;
//
//    }

//    //CREATE USER GAME ORIGINAL
//
//    public function CREATE_UserGame($userID, $gameName, $notice){
//
//        $sql = "INSERT INTO user_games (user_id, games_id, permission, player_status, notices)
//                VALUES (:user_id, (SELECT id FROM games WHERE game_name = $gameName), :permission, :player_status, :notices)";
//
//        $stm = $this->db->prepare($sql);
//        $stm->bindValue(':user_id', $userID, PDO::PARAM_STR);
//        $stm->bindValue(':permission', '2', PDO::PARAM_STR); // 2 = gm
//        $stm->bindValue(':player_status', '1', PDO::PARAM_STR); //1 = accepted
//        $stm->bindValue(':notices', $notice, PDO::PARAM_STR); //
//        $result =$stm->execute();
//        return $result;
//
//    }

    //CREATE USER GAME NEW

    public function CREATE_UserGame($userID, $gameID, $notice){

        $sql = "INSERT INTO user_games (user_id, games_id, permission, player_status, notes, notices)
                VALUES (:user_id, :games_id, :permission, :player_status, :notes, :notices)";

        $stm = $this->db->prepare($sql);
        $stm->bindValue(':user_id', $userID, PDO::PARAM_STR);
        $stm->bindValue(':games_id', $gameID, PDO::PARAM_STR);
        $stm->bindValue(':permission', 2, PDO::PARAM_STR); //2 = gm
        $stm->bindValue(':player_status', 1, PDO::PARAM_STR); //1 = accepted
        $stm->bindValue(':notes', 'this is a note', PDO::PARAM_STR);
        $stm->bindValue(':notices', $notice, PDO::PARAM_STR);
        $result =$stm->execute();
        return $result;

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