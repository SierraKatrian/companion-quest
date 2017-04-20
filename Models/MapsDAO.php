<?php

class MapsDAO
{

    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    //SAVE MAP TO DATABASE

    public function CREATE_Map($gameID, $mapName, $mapImage){

        $sql = "INSERT INTO maps (game_id, name, image, selected) VALUES (:game_id, :name, :image, :selected)";
        $stm = $this->db->prepare($sql);
        $stm->bindValue(':game_id', $gameID, PDO::PARAM_STR);
        $stm->bindValue(':name', $mapName, PDO::PARAM_STR);
        $stm->bindValue(':image', $mapImage, PDO::PARAM_STR);
        $stm->bindValue(':selected', 1, PDO::PARAM_STR);
        $result = $stm->execute();
        return $result;

    }

    //GET ALL VALUES FROM MAPS TABLE

    public function READ_Maps($gameID){

        $sql = "SELECT * FROM maps WHERE game_id = :game_id";
        $stm = $this->db->prepare($sql);
        $stm->bindValue(':game_id', $gameID);
        $result = $stm->execute();
        $result = $stm->fetchAll();
        return $result;

    }

    //UPDATE SELECTED IMAGE

    public function UPDATE_SelectedMap($gameID, $selectedMapID){

        $sql = "UPDATE maps
                SET selected = 1
                WHERE game_id = :game_id AND selected = 2";
        $stm = $this->db->prepare($sql);
        $stm->bindValue(':game_id', $gameID);
        $result = $stm->execute();

        $sql2 = "UPDATE maps
                 SET selected = 2
                 WHERE id = :selected";
        $stm = $this->db->prepare($sql2);
        $stm->bindValue(':selected', $selectedMapID);
        $result = $stm->execute();

    }

    //POPULATE DIV WITH SELECTED MAP

    public function READ_SelectedMap($gameID){

        $sql = "SELECT * FROM maps WHERE game_id = :game_id AND selected = 2";
        $stm = $this->db->prepare($sql);
        $stm->bindValue(':game_id', $gameID);
        $result = $stm->execute();
        $result = $stm->fetchAll();
        return $result;

    }

    //DELETE MAPS

    public function DELETE_SelectedMap($gameID){
        $sql = "DELETE FROM maps WHERE game_id = :game_id AND selected = 2";
        $stm = $this->db->prepare($sql);
        $stm->bindValue(':game_id', $gameID);
        $result = $stm->execute();
    }


}//end of CLASS
