<?php

class DbQuery1
{

    public function READ_checkDuplicates(){

        $dbc = new DbConnect();
        $db = $dbc->getDb();

        $username = $_POST['registrationForm__userName'];
        $email = $_POST['registrationForm__email'];

        $duplicate_usernameQuery = "SELECT * FROM users WHERE user_name = :username OR email = :email";
        $pdostmt = $db->prepare($duplicate_usernameQuery);
        $pdostmt->bindValue(':username', $username, PDO::PARAM_STR);
        $pdostmt->bindValue(':email', $email, PDO::PARAM_STR);
        $pdostmt->execute();
        $duplicateValuesCheck = $pdostmt->fetch();

        if(!empty($duplicateValuesCheck)){
            return false;
        } else {
            return true;
        }

    }

    public function CREATE_RegisterUser(){

        $dbc = new DbConnect();
        $db = $dbc->getDb();

        $fname = $_POST['registrationForm__fName'];
        $lname = $_POST['registrationForm__lName'];
        $username = $_POST['registrationForm__userName'];
        $password = $_POST['registrationForm__password'];
        $email = $_POST['registrationForm__email'];

        $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

        $ADD_UsersQuery = "INSERT INTO users (f_name, l_name, user_name, password, email) VALUES (:fname, :lname, :username, :password, :email)";
        $pdostmt = $db->prepare($ADD_UsersQuery);
        $pdostmt->bindValue(':fname', $fname, PDO::PARAM_STR);
        $pdostmt->bindValue(':lname', $lname, PDO::PARAM_STR);
        $pdostmt->bindValue(':username', $username, PDO::PARAM_STR);
        $pdostmt->bindValue(':password', $encryptedPassword, PDO::PARAM_STR);
        $pdostmt->bindValue(':email', $email, PDO::PARAM_STR);
        $pdostmt->execute();
        $pdostmt->closeCursor();

    }

    public function READ_AuthenticateUser($email, $password){
        $dbc = new DbConnect();
        $db = $dbc->getDb();

        $READ_UsersQuery = "SELECT * FROM users WHERE email = :email";
        $pdostmt2 = $db->prepare($READ_UsersQuery);
        $pdostmt2->bindValue(':email', $email, PDO::PARAM_STR);
        $pdostmt2->execute();
        $userdetails = $pdostmt2->fetch();

        if(password_verify($password, $userdetails['password'])){
            return $userdetails;
        }
    }

}