<?php

class DbConnect
{

<<<<<<< HEAD
    private static $dsn = 'mysql:host=localhost;dbname=CCDB';
=======
    private static $dsn = 'mysql:host=localhost;dbname=Companion_Quest';
>>>>>>> e49a98da72f4a3dc7d299e942f1b6da706647cfe
    private static $username = 'root';
    private static $password = '';
    //reference to db connection
    private static $db;

    //return reference to pdo object
    public static function getDB () {

        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                    self::$username,
                    self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo $error_message;
                exit();
            }
        }
        return self::$db;
    }

}

//DbConnect::getDB();

?>
