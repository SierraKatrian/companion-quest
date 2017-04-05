<?php

class DbConnect
{

    private $dsn = "mysql:host=localhost;dbname=CompanionQuest";
    private $username = "root";
    private $password = "";
    private $db;

    public function getDb(){
        try{
            $this->db = new PDO($this->dsn, $this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        return $this->db;
    }

}

$db = new DbConnect();
$db -> getDb();