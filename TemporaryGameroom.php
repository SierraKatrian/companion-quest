<?php
require_once 'View/Header.php';
require_once 'Models/CharacterDAO.php';

$charClass = new CharacterDAO();

$userID = 18;
$roleID = 3;
$gameID = 30;
$statsID = 4;


if (isset($_POST['btn_submit'])) {
    $setPlayerChar = $charClass->setPlayerChar($db, $userID, $roleID, $gameID);
    // $insertStats = $charClass->insertStats($db);
    // $updateCharStats = $charClass->updateCharStats($db, $insertStats, $userID, $roleID, $gameID);

    // var_dump($insertStats);
}

?>



<main class="container-fluid">

    <form class="" action="" method="post">
        <!-- <input type="text" name="" value="">
        <input type="text" name="" value="">
        <input type="text" name="" value=""> -->
        <button type="submit" name="btn_submit">Submit</button>
    </form>

    <?php //require_once 'View/CreateCharacter.php'; ?>
    <?php //require_once 'View/Dice-Roller.php'; ?>
</main>

<!-- <script type="text/javascript" src="Script/dice-roller.js"></script> -->
<!-- <script type="text/javascript" src="Script/select-chars.js"></script> -->
<?php require_once 'View/Footer.php'; ?>
