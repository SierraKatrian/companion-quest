<?php

if (isset($_POST['roll-dice-form__btn-roll']) || isset($_POST['btn-roll-saved-dice'])) {
    $results = [];

    $numSides = $_POST['roll-dice-form__sides'];
    $numDice = $_POST['roll-dice-form__quantity'];
    $modNum = $_POST['roll-dice-form__modifier'];

    if ($numDice == NULL || $numSides == NULL) {
        $message = "Please enter both number of dice and number of sides. (modifier is optional)";
    } else {
        if ($modNum > 0) {
            $modNum = '+' . $modNum;
        }

        require_once './model/dicedao.php';

        $diceClass = new DiceDAO();
        $results = $diceClass->rollDice($numSides, $numDice, $modNum);
    }
}

?>
