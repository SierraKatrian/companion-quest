<?php

class DiceDAO {

    public function getSavedDice($db, $userID, $gameID){
        $query = 'SELECT * FROM saved_dice
        WHERE user_id = :userID
        AND game_id = :gameID';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID, PDO::PARAM_INT);
        $statement->bindValue(':gameID', $gameID, PDO::PARAM_INT);
        $statement->execute();
        $viewSavedDice = $statement->fetchAll(PDO::FETCH_OBJ);
        $statement->closeCursor();

        return $viewSavedDice;
    }

    public function saveDice($db, $userID, $gameID, $numSides, $numDice, $modNum){
        $query = 'INSERT INTO saved_dice
                  (user_id, game_id, quantity, sides, modifier)
                  VALUES (:userID, :gameID, :quantity, :sides,  :modifier)';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID, PDO::PARAM_INT);
        $statement->bindValue(':gameID', $gameID, PDO::PARAM_INT);
        $statement->bindValue(':sides', $numSides, PDO::PARAM_INT);
        $statement->bindValue(':quantity', $numDice, PDO::PARAM_INT);
        $statement->bindValue(':modifier', $modNum, PDO::PARAM_INT);
        $statement->execute();
        $statement->closeCursor();

        return true;
    }

    public function deleteDice($db, $id) {
            $query = 'DELETE FROM saved_dice WHERE id = :ID';
            $statement = $db->prepare($query);
            $statement->bindValue(':ID',$id, PDO::PARAM_INT);
            $row = $statement->execute();

            return true;
    }

    public function updateDice($db, $id, $dice) {
        $query = 'UPDATE saved_dice SET sides = :sides, quantity = :quantity, modifier = :modifier WHERE id = :ID';
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
}

?>
