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

    public function setAvailCharacters($db, $roleID, $gameID, $perms) {
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

    public function getGameChars($db, $gameID) {
        $query = 'SELECT roles.id, roles.role_name, roles.picture, roles_perms.permissions, games.game_name, rulebooks.name
                  FROM roles
                  JOIN roles_perms ON roles_perms.role_id = roles.id
                  JOIN games ON games.id = roles_perms.game_id
                  JOIN rulebooks ON rulebooks.id = games.rb_id
                  WHERE game_id = :gameID';
        $statement = $db->prepare($query);
        $statement->bindValue(':gameID', $gameID, PDO::PARAM_INT);
        $statement->execute();
        $getChars = $statement->fetchAll(PDO::FETCH_OBJ);
        $statement->closeCursor();

        return $getChars;
    }

    public function updateGameChars($db, $roleID, $gameID, $perms) {
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
}

?>
