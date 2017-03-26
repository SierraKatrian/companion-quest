<?php

if(isset($_POST['saved-dice-form__btn-delete'])){
    $id = $_POST['saved-dice-form__id'];

    require_once './model/database.php';
    require_once './model/dicedao.php';

    $dbClass = new Database();
    $db = $dbClass->getDb();

    $diceClass = new DiceDAO();
    $delete = $diceClass->deleteDice($db, $id);
}

?>
