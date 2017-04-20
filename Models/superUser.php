<?php

/**
 * Created by PhpStorm.
 * User: jessmount
 * Date: 2017-04-19
 * Time: 7:07 PM
 */
class superUser
{

    public function getAllUsers($db)
    {
        $query = "SELECT * FROM users";
        $statement = $db->prepare($query);
        $statement->execute();
        $allUsers = $statement->fetchAll();

        return $allUsers;
    }

    public function deleteUser($db, $userId)
    {

        $query = "DELETE FROM users WHERE id = :user_id";
        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $userId);
        $statement->execute();

    }

    public function changeUserPermissions($db, $userId)
    {

        $query = "UPDATE users SET permissions = 2 WHERE id = :userId";
        $statement = $db->prepare($query);
        $statement->bindValue(':userId', $userId);
        $statement->execute();
    }
}