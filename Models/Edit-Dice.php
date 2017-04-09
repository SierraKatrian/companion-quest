<?php

if (isset($_POST['saved-dice-form__btn-edit'])) {

    $id = filter_input(INPUT_POST, 'saved-dice-form__id', FILTER_VALIDATE_INT);

    require_once 'DbConnect.php';
    require_once 'DiceDAO.php';

    $dbClass = new DbConnect();
    $db = $dbClass->getDB();

    $diceClass = new DiceDAO();
    $getDice = $diceClass->getDice($db, $id);

    $jsonDice = json_encode($getDice);

    header ('Content-Type: application/json');

    echo $jsonDice;

}

if (isset($_POST['edit-dice-form__btn-update'])) {
    $id = filter_input(INPUT_POST, 'edit-dice-form__id', FILTER_VALIDATE_INT);
    $numSides = filter_input(INPUT_POST, 'edit-dice-form__sides', FILTER_VALIDATE_INT);
    $numDice = filter_input(INPUT_POST, 'edit-dice-form__quantity', FILTER_VALIDATE_INT);
    $modNum = filter_input(INPUT_POST, 'edit-dice-form__modifier', FILTER_VALIDATE_INT);

    if ($numDice == NULL || $numSides == NULL) {

        $message = "Please enter both number of dice and number of sides. (modifier is optional)";

    } else {

        require_once './model/database.php';
        require_once './model/dice.php';
        require_once './model/dicedao.php';

        $dbClass = new Database();
        $db = $dbClass->getDb();

        $dice = new Dice();
        $dice->setSides($numSides);
        $dice->setQuantity($numDice);
        $dice->setModifier($modNum);

        $diceClass = new DiceDAO();
        $saveDice = $diceClass->updateDice($db, $id, $dice);
    }
}
?>
