<?php

class UsersDAO
{

    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    //CHECK FOR DUPLICATE USER

    public function READ_CheckDuplicateUser($username, $email){

        $sql = "SELECT * FROM users WHERE user_name = :username OR email = :email";

        $stm = $this->db->prepare($sql);
        $stm->bindValue(':username', $username, PDO::PARAM_STR);
        $stm->bindValue(':email', $email, PDO::PARAM_STR);
        $stm->execute();
        $duplicateValuesCheck = $stm->fetch();

        if(!empty($duplicateValuesCheck)){
            return false;
        } else {
            return true;
        }

    }

    //REGISTER USER

    public function CREATE_User($fname,$lname,$username,$password,$email){

        $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (f_name, l_name, user_name, password, email) VALUES (:fname, :lname, :username, :password, :email)";
        $stm = $this->db->prepare($sql);
        $stm->bindValue(':fname', $fname, PDO::PARAM_STR);
        $stm->bindValue(':lname', $lname, PDO::PARAM_STR);
        $stm->bindValue(':username', $username, PDO::PARAM_STR);
        $stm->bindValue(':password', $encryptedPassword, PDO::PARAM_STR);
        $stm->bindValue(':email', $email, PDO::PARAM_STR);
        $result =$stm->execute();

        return $result;

    }

    //SIGN IN USER

    public function READ_SignInUser($email, $password){

        $sql = "SELECT * FROM users WHERE email = :email";

        $stm = $this->db->prepare($sql);
        $stm->bindValue(':email', $email, PDO::PARAM_STR);
        $stm->execute();
        $userdetails = $stm->fetch();

        if(password_verify($password, $userdetails['password'])){
            return $userdetails;
        }

    }

    //DELETE USER

    public function DELETE_User($email){

        $sql = "DELETE FROM users WHERE email = :email";

        $stm = $this->db->prepare($sql);
        $stm->bindValue(':email', $email, PDO::PARAM_STR);
        $stm->execute();
        $stm->closeCursor();

    }

    public function UPDATE_User($currentEmail,$fname,$lname,$username,$password,$email){

        $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE users 
                    SET f_name = :fname, l_name = :lname, user_name = :username, password = :password, email = :email
                    WHERE email=$currentEmail";
        $stm = $this->db->prepare($sql);
        $stm->bindValue(':fname', $fname, PDO::PARAM_STR);
        $stm->bindValue(':lname', $lname, PDO::PARAM_STR);
        $stm->bindValue(':username', $username, PDO::PARAM_STR);
        $stm->bindValue(':password', $encryptedPassword, PDO::PARAM_STR);
        $stm->bindValue(':email', $email, PDO::PARAM_STR);
        $result =$stm->execute();

        return $result;
    }

    /*
    public function getUser(){

        $sql = "SELECT DISTINCT category FROM mproducts";
        $stm = $this->db->prepare($sql);
        $stm->execute();

        $category = $stm->fetchAll();
        return $category;
    }

    public function getUsers(){

        $sql = "SELECT * FROM mproducts";
        $stm = $this->db->prepare($sql);
        $stm->execute();

        $products = $stm->fetchAll();

        return $products;
    }*/

}