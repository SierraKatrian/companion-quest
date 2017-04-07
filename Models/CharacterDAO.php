<?php

class CharacterDAO {

    public function getCharSheet($db, $userID, $rbID, $gamesID){
        $query = 'SELECT * FROM characters WHERE user_id = :userID AND games_id = :gamesID';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID, PDO::PARAM_INT);
        $statement->bindValue(':gamesID', $gamesID, PDO::PARAM_INT);
        $statement->execute();
        $viewCharacter = $statement->fetchAll(PDO::FETCH_OBJ);
        $statement->closeCursor();

        return $viewCharacter;
    }

    public function getRole($db, $rbID, $roleID){
        $query = 'SELECT * FROM roles WHERE id = :ID AND rulebook_id = :rulebookID';
        $statement = $db->prepare($query);
        $statement->bindValue(':rulebookID', $rbID, PDO::PARAM_INT);
        $statement->bindValue(':ID', $roleID, PDO::PARAM_INT);
        $statement->execute();
        $viewCharacter = $statement->fetchAll(PDO::FETCH_OBJ);
        $statement->closeCursor();

        return $viewCharacter;
    }

    public function getMoves($db, $roleID){
        $query = 'SELECT * FROM moves WHERE role_id = :roleID';
        $statement = $db->prepare($query);
        $statement->bindValue(':roleID', $roleID, PDO::PARAM_INT);
        $statement->execute();
        $viewMoves = $statement->fetchAll(PDO::FETCH_OBJ);
        $statement->closeCursor();

        return $viewMoves;
    }
}

?>
