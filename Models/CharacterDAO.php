<?php

class CharacterDAO {

    public function getCharacter($db, $userID, $gameID) {
        $query = 'SELECT * FROM characters
                  WHERE user_id = :userID
                  AND game_id = :gameID';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID, PDO::PARAM_INT);
        $statement->bindValue(':gameID', $gameID, PDO::PARAM_INT);
        $statement->execute();
        $character = $statement->fetchAll(PDO::FETCH_OBJ);
        $statement->closeCursor();

        return $character;
    }

    public function getCharSheet($db, $userID, $gameID){
        $query = 'SELECT characters.id, characters.role_id, characters.name, characters.eyes, characters.hair, characters.gender, characters.clothes, characters.body, characters.face, characters.added_gear, characters.selected_moves, characters.alignment, roles.bio, roles.role_name, roles.picture, roles.stats, roles.gear, roles.barter,
        roles.moves, stats.stat1, stats.stat2, stats.stat3, stats.stat4, stats.stat5, harm.total_harm, harm.stabilized, harm.minus_hard, harm.plus_weird, harm.new_role, harm.die
                  FROM characters
                  JOIN roles ON roles.id = characters.role_id
                  JOIN stats ON stats.char_id = characters.id
                  JOIN harm ON harm.char_id = characters.id
                  WHERE user_id = :userID
                  AND game_id = :gameID';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID, PDO::PARAM_INT);
        $statement->bindValue(':gameID', $gameID, PDO::PARAM_INT);
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

    public function getRoleMoves($db, $roleID){
        $query = 'SELECT * FROM moves WHERE role_id = :roleID';
        $statement = $db->prepare($query);
        $statement->bindValue(':roleID', $roleID, PDO::PARAM_INT);
        $statement->execute();
        $viewMoves = $statement->fetchAll(PDO::FETCH_OBJ);
        $statement->closeCursor();

        return $viewMoves;
    }

    // public function submitPlayerChar($db, $userID, $roleID, $gameID, $name, $hair, $face, $eyes, $body, $clothes, $gender, $alignment, $addedGear, $selectedMoves) {
    //     $query = 'INSERT INTO characters
    //               (user_id, role_id, game_id, name, hair, face, eyes, body, clothes, gender, alignment, added_gear, selected_moves)
    //               VALUES (:userID, :roleID, :gameID, :name, :hair, :face, :eyes, :body, :clothes, :gender, :alignment, :added_gear, :selected_moves)';
    //     $statement = $db->prepare($query);
    //     $statement->bindValue(':userID', $userID, PDO::PARAM_INT);
    //     $statement->bindValue(':roleID', $roleID, PDO::PARAM_INT);
    //     $statement->bindValue(':gameID', $gameID, PDO::PARAM_INT);
    //     $statement->bindValue(':name', $name, PDO::PARAM_STR);
    //     $statement->bindValue(':hair', $hair, PDO::PARAM_STR);
    //     $statement->bindValue(':face', $face, PDO::PARAM_STR);
    //     $statement->bindValue(':eyes', $eyes, PDO::PARAM_STR);
    //     $statement->bindValue(':body', $body, PDO::PARAM_STR);
    //     $statement->bindValue(':clothes', $clothes, PDO::PARAM_STR);
    //     $statement->bindValue(':gender', $gender, PDO::PARAM_STR);
    //     $statement->bindValue(':alignment', $alignment, PDO::PARAM_STR);
    //     $statement->bindValue(':added_gear', $addedGear, PDO::PARAM_LOB);
    //     $statement->bindValue(':selected_moves', $selectedMoves, PDO::PARAM_LOB);
    //     $statement->execute();
    //     $statement->closeCursor();
    //
    //     return true;
    // }

    public function setPlayerChar($db, $userID, $roleID, $gameID) {
        $query = 'INSERT INTO characters
                  (user_id, role_id, game_id)
                  VALUES
                  (:userID, :roleID, :gameID)';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID, PDO::PARAM_INT);
        $statement->bindValue(':roleID', $roleID, PDO::PARAM_INT);
        $statement->bindValue(':gameID', $gameID, PDO::PARAM_INT);
        $statement->execute();
        $statement->closeCursor();

        return true;
    }

    // Inserts a blank row
    public function setCharStats($db, $charID){
        $query = 'INSERT INTO stats
                   (char_id)
                   VALUES
                   (:charID)';
        $statement = $db->prepare($query);
        $statement->bindValue(':charID', $charID, PDO::PARAM_INT);
        $statement->execute();
        $statement->closeCursor();

        return true;
    }

    // Inserts a blank row
    public function setCharHarm($db, $charID){
        $query = 'INSERT INTO stats
                   (char_id)
                   VALUES
                   (:charID)';
        $statement = $db->prepare($query);
        $statement->bindValue(':charID', $charID, PDO::PARAM_INT);
        $statement->execute();
        $statement->closeCursor();

        return true;
    }

    public function updateCharStats($db, $charID, $stat1, $stat2, $stat3, $stat4, $stat5) {
        $query = 'UPDATE characters
                   SET stat1 = :stat1, stat2 = :stat2, stat3 = :stat3, stat4 = :stat4, stat5 = :stat5
                   WHERE char_id = :charID';
        $statement = $db->prepare($query3);
        $statement->bindValue(':stat1', $stat1, PDO::PARAM_INT);
        $statement->bindValue(':stat2', $stat2, PDO::PARAM_INT);
        $statement->bindValue(':stat3', $stat3, PDO::PARAM_INT);
        $statement->bindValue(':stat4', $stat4, PDO::PARAM_STR);
        $statement->bindValue(':stat5', $stat5, PDO::PARAM_STR);
        $statement->bindValue(':charID', $charID, PDO::PARAM_INT);
        $statement->execute();
        $statement->closeCursor();

        return true;
    }

    public function updateCharHarm($db, $charID, $harm, $stabilized, $minusHard, $plusWeird, $newRole, $die) {
        $query = 'UPDATE characters
                   SET total_harm = :harm, stabilized = :stabilized, minus_hard = :minusHard, plus_weird = :plusWeird, new_role = :newRole, die = :die
                   WHERE char_id = :charID';
        $statement = $db->prepare($query3);
        $statement->bindValue(':harm', $harm, PDO::PARAM_STR);
        $statement->bindValue(':stabilized', $stabilized, PDO::PARAM_STR);
        $statement->bindValue(':minusHard', $minusHard, PDO::PARAM_STR);
        $statement->bindValue(':plusWeird', $plusWeird, PDO::PARAM_STR);
        $statement->bindValue(':newRole', $newRole, PDO::PARAM_STR);
        $statement->bindValue(':die', $die, PDO::PARAM_LOB);
        $statement->bindValue(':charID', $charID, PDO::PARAM_INT);
        $statement->execute();
        $statement->closeCursor();

        return true;
    }


    public function updatePlayerChar($db, $userID, $roleID, $gameID, $name = '', $hair = '', $face = '', $eyes = '', $body = '', $clothes = '', $gender = '', $selectedGear = '', $selectedMoves = '', $alignment = '') {
        $query = 'UPDATE characters
                  SET name = :name, hair = :hair, face = :face, , eyes = :eyes, body = :body
                --   , clothes = :clothes, gender = :gender, alignment = :alignment, added_gear = :added_gear, selected_moves = :selected_moves
                  WHERE user_id = :userID
                  AND role_id = :roleID
                  AND game_id = :gameID';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID, PDO::PARAM_INT);
        $statement->bindValue(':roleID', $roleID, PDO::PARAM_INT);
        $statement->bindValue(':gameID', $gameID, PDO::PARAM_INT);
        $statement->bindValue(':name', $name, PDO::PARAM_STR);
        $statement->bindValue(':hair', $hair, PDO::PARAM_STR);
        $statement->bindValue(':face', $face, PDO::PARAM_STR);
        $statement->bindValue(':eyes', $eyes, PDO::PARAM_STR);
        $statement->bindValue(':body', $body, PDO::PARAM_STR);
        // $statement->bindValue(':clothes', $clothes, PDO::PARAM_STR);
        // $statement->bindValue(':gender', $gender, PDO::PARAM_STR);
        // $statement->bindValue(':added_gear', $selectedGear, PDO::PARAM_LOB);
        // $statement->bindValue(':selected_moves', $selectedMoves, PDO::PARAM_LOB);
        // $statement->bindValue(':alignment', $alignment, PDO::PARAM_STR);
        $statement->execute();
        $statement->closeCursor();

        return true;
    }

    public function getAvailCharacters($db, $rbID) {
        $query = 'SELECT * FROM roles WHERE rulebook_id = :rulebookID';
        $statement = $db->prepare($query);
        $statement->bindValue(':rulebookID', $rbID, PDO::PARAM_INT);
        $statement->execute();
        $viewAvailChars = $statement->fetchAll(PDO::FETCH_OBJ);
        $statement->closeCursor();

        return $viewAvailChars;
    }

    public function setAvailCharacters($db, $roleID, $gameID, $perms = 1, $selected = 0) {
        $query = 'INSERT INTO roles_perms
                  (role_id, game_id, permissions, selected)
                  VALUES (:roleID, :gameID, :perms, :selected)';
        $statement = $db->prepare($query);
        $statement->bindValue(':roleID', $roleID, PDO::PARAM_INT);
        $statement->bindValue(':gameID', $gameID, PDO::PARAM_INT);
        $statement->bindValue(':perms', $perms, PDO::PARAM_INT);
        $statement->bindValue(':selected', $selected, PDO::PARAM_INT);
        $statement->execute();
        $statement->closeCursor();

        return true;
    }

    public function getGameChars($db, $gameID) {
        $query = 'SELECT roles.role_name, roles.picture, roles.bio, roles_perms.role_id, roles_perms.permissions, roles_perms.selected, games.game_name, games.rb_id, rulebooks.name
                  FROM roles
                  JOIN roles_perms ON roles_perms.role_id = roles.id
                  JOIN games ON roles_perms.game_id = games.id
                  JOIN rulebooks ON rulebooks.id = games.rb_id
                  WHERE game_id = :gameID';
        $statement = $db->prepare($query);
        $statement->bindValue(':gameID', $gameID, PDO::PARAM_INT);
        $statement->execute();
        $getChars = $statement->fetchAll(PDO::FETCH_OBJ);
        $statement->closeCursor();

        return $getChars;
    }

    public function disableSelectedChar($db, $roleID, $gameID) {
        $query = 'UPDATE roles_perms
                  SET selected = 1
                  WHERE role_id = :roleID AND game_id = :gameID';
        $statement = $db->prepare($query);
        $statement->bindValue(':roleID', $roleID, PDO::PARAM_INT);
        $statement->bindValue(':gameID', $gameID, PDO::PARAM_INT);
        $statement->execute();
        $statement->closeCursor();

        return true;
    }
}

?>
