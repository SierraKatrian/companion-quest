<?php

class AvailCharactersDAO
{
    public function getAvailCharacters($db, $rbID) {
        $query = 'SELECT * FROM roles WHERE rulebook_id = :rulebookID';
        $statement = $db->prepare($query);
        $statement->bindValue(':rulebookID', $rbID, PDO::PARAM_INT);
        $statement->execute();
        $viewAvailChars = $statement->fetchAll(PDO::FETCH_OBJ);
        $statement->closeCursor();

        return $viewAvailChars;
    }

    public function setAvailCharacters($db, $roleID, $gameID, $perms = 1) {
        $query = 'INSERT INTO roles_perms
                  (role_id, game_id, permissions)
                  VALUES (:roleID, :gameID, :perms)';
        $statement = $db->prepare($query);
        $statement->bindValue(':roleID', $roleID, PDO::PARAM_INT);
        $statement->bindValue(':gameID', $gameID, PDO::PARAM_INT);
        $statement->bindValue(':perms', $perms, PDO::PARAM_INT);
        $statement->execute();
        $statement->closeCursor();

        return true;
    }

    // public function getChars($db, $gameID) {
    //     $query = 'SELECT role_id FROM roles_perms
    //               WHERE game_id = :gameID';
    //     $statement = $db->prepare($query);
    //     $statement->bindValue(':gameID', $gameID, PDO::PARAM_INT);
    //     $statement->execute();
    //     $getChars = $statement->fetchAll(PDO::FETCH_OBJ);
    //     $statement->closeCursor();
    //
    //     return $getChars;
    // }

    public function getGameChars($db, $gameID) {
        $query = 'SELECT *
                  FROM roles
                --   JOIN roles_perms ON roles_perms.role_id = roles.id
                  WHERE game_id = :gameID';
        $statement = $db->prepare($query);
        $statement->bindValue(':gameID', $gameID, PDO::PARAM_INT);
        $statement->execute();
        $getChars = $statement->fetchAll(PDO::FETCH_OBJ);
        $statement->closeCursor();

        return $getChars;
    }

}

?>
