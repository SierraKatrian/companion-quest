<?php

class DiceDAO {

    public function rollDice($sides, $quantity, $modifier = 0){
        $i = 1;
        $results = array();
        for($i = $quantity; $i > 0; $i--) {
            $results[] = (floor(mt_rand(1, $sides)) % $sides) + 1;
        }
        return $results;
    }

    public function getSavedDice($db, $charID){
        $query = 'SELECT * FROM saved_dice WHERE char_id = :charID';
        $statement = $db->prepare($query);
        $statement->bindValue(':charID', $charID, PDO::PARAM_INT);
        $statement->execute();
        $viewSavedDice = $statement->fetchAll(PDO::FETCH_OBJ);
        $statement->closeCursor();

        return $viewSavedDice;
    }

    public function saveDice($db, $dice){
        $query = 'INSERT INTO saved_dice
                  (char_id, sides, quantity, modifier)
                  VALUES (:charID, :sides, :quantity, :modifier)';
        $statement = $db->prepare($query);
        $statement->bindValue(':charID', $dice->getCharId(), PDO::PARAM_INT);
        $statement->bindValue(':sides', $dice->getSides(), PDO::PARAM_INT);
        $statement->bindValue(':quantity', $dice->getQuantity(), PDO::PARAM_INT);
        $statement->bindValue(':modifier', $dice->getModifier(), PDO::PARAM_INT);
        $statement->execute();
        $statement->closeCursor();

        return true;
    }

    public function deleteDice($db, $id) {
            $query = 'DELETE FROM saved_dice WHERE Id = :ID';
            $statement = $db->prepare($query);
            $statement->bindValue(':ID',$id, PDO::PARAM_INT);
            $row = $statement->execute();

            return true;
    }

    public function updateDice($db, $id, $dice) {
        $query = 'UPDATE saved_dice SET sides = :sides, quantity = :quantity, modifier = :modifier WHERE Id = :ID';
        $statement = $db->prepare($query);
        $statement->bindValue(':ID', $id, PDO::PARAM_INT);
        $statement->bindValue(':sides', $dice->getSides(), PDO::PARAM_INT);
        $statement->bindValue(':quantity', $dice->getQuantity(), PDO::PARAM_INT);
        $statement->bindValue(':modifier', $dice->getModifier(), PDO::PARAM_INT);
        $row = $statement->execute();
        $statement->closeCursor();

        return true;
    }

    public function getDice($db, $id) {
        $query = "SELECT * FROM saved_dice WHERE Id = :ID";
        $statement = $db->prepare($query);
        $statement->bindValue(':ID',$id, PDO::PARAM_INT);
        $statement->execute();
        $dice = $statement->fetch(PDO::FETCH_OBJ);
        // $statement->closeCursor();

        return $dice;
    }

    public function getCharacterId() {
        'SELECT char_id FROM chars WHERE game_id = :game_id';
    }
}

?>
