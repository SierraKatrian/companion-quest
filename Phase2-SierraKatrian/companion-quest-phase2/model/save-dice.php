<?php

if (isset($_POST['roll-dice-form__btn-save'])) {
    $charID = filter_input(INPUT_POST, 'roll-dice-form__char-id', FILTER_VALIDATE_INT);
    $numSides = filter_input(INPUT_POST, 'roll-dice-form__sides', FILTER_VALIDATE_INT);
    $numDice = filter_input(INPUT_POST, 'roll-dice-form__quantity', FILTER_VALIDATE_INT);
    $modNum = filter_input(INPUT_POST, 'roll-dice-form__modifier', FILTER_VALIDATE_INT);

    if ($numDice == NULL || $numSides == NULL) {

        $message = "Please enter both number of dice and number of sides. (modifier is optional)";

    } else {
        require_once './model/database.php';
        require_once './model/dice.php';
        require_once './model/dicedao.php';
        $dbClass = new Database();
        $db = $dbClass->getDb();

        $dice = new Dice();
        $dice->setCharId($charID);
        $dice->setSides($numSides);
        $dice->setQuantity($numDice);
        $dice->setModifier($modNum);

        $diceClass = new DiceDAO();
        $saveDice = $diceClass->saveDice($db, $dice);
    }
}

?>
