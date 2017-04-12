<?php

class CharacterDAO {

    public function getCharSheet($db, $userID, $gameID){
        $query = 'SELECT characters.roles_id, characters.name, characters.eyes, characters.hair, characters.gender, characters.clothes, characters.face, characters.added_gear, characters.selected_moves, characters.alignment, roles.bio, roles.role_name, roles.stats, roles.gear, roles.barter, roles.moves, stats.stat1,stats.stat2, stats.stat3, stats.stat4, stats.stat5, harm.total_harm, harm.stabilized, harm.minus_hard, harm.plus_weird, harm.new_role, harm.die
                  FROM characters
                  JOIN roles ON roles.id = characters.roles_id
                  JOIN stats ON stats.id = characters.stats_id
                  JOIN harm ON harm.id = characters.harm_id
                  WHERE users_id = :usersID
                  AND games_id = :gamesID';
        $statement = $db->prepare($query);
        $statement->bindValue(':usersID', $userID, PDO::PARAM_INT);
        $statement->bindValue(':gamesID', $gameID, PDO::PARAM_INT);
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

    public function getGear($db, $charID){
        $query = 'SELECT * FROM roles WHERE id = :ID AND rulebook_id = :rulebookID';
        $statement = $db->prepare($query);
        $statement->bindValue(':rulebookID', $rbID, PDO::PARAM_INT);
        $statement->bindValue(':ID', $roleID, PDO::PARAM_INT);
        $statement->execute();
        $viewCharacter = $statement->fetchAll(PDO::FETCH_OBJ);
        $statement->closeCursor();

        return $viewCharacter;
    }

    public function getUser($db, $userID){
        $query = 'SELECT * FROM users WHERE id = :ID';
        $statement = $db->prepare($query);
        $statement->bindValue(':ID', $userID, PDO::PARAM_INT);
        $statement->execute();
        $viewUser = $statement->fetchAll(PDO::FETCH_OBJ);
        $statement->closeCursor();

        return $viewUser;
    }

    public function getGame($db, $gameID){
        $query = 'SELECT * FROM games WHERE id = :ID';
        $statement = $db->prepare($query);
        $statement->bindValue(':ID', $gameID, PDO::PARAM_INT);
        $statement->execute();
        $viewUser = $statement->fetchAll(PDO::FETCH_OBJ);
        $statement->closeCursor();

        return $viewUser;
    }

    public function getRoleMoves($db, $roleID){
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
