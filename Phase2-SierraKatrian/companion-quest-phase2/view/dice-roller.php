<?php
require_once './model/database.php';
require_once './model/dicedao.php';
require_once './model/roll-dice.php';
require_once './model/save-dice.php';
require_once './model/delete-dice.php';
require_once './model/edit-dice.php';

$dbClass = new Database();
$db = $dbClass->getDb();

$charID = 4;
$diceClass = new DiceDAO();
$viewSavedDice = $diceClass->getSavedDice($db, $charID);

$message = '';

?>

    <!-- ROLL DICE -->
    <form class="roll-dice-form form-horizontal" action="" method="post">
        <div class="form-group">
            <input type="hidden" name="roll-dice-form__char-id" value="<?php echo $charID ?>" />
        </div>
        <div class="form-group">
            <label class="control-label col-sm-7" for="roll-dice-form__quantity">Number of dice</label>
            <div class="col-sm-5">
                <input class="form-control" type="number" name="roll-dice-form__quantity" value="<?php echo $numDice ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-7" for="roll-dice-form__sides">Number of sides</label>
            <div class="col-sm-5">
                <input class="form-control" type="number" name="roll-dice-form__sides" value="<?php echo $numSides ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-7" for="roll-dice-form__modifier">Modifier</label>
            <div class="col-sm-5">
                <input class="form-control" type="number" name="roll-dice-form__modifier" value="<?php echo $modNum ?>" />
            </div>
        </div>
        <div class="roll-btns btn-group btn-group">
            <button class="btn btn-default" type="submit" name="roll-dice-form__btn-roll">Roll Dice</button>
            <button class="btn btn-default" type="submit" name="roll-dice-form__btn-save">Save Roll</button>
        </div>
        <div class="roll-btns">
            <button class="btn btn-default" type="button" name="roll-dice-form__btn-view">View Saved Dice</button>
        </div>
    </form>
    <p><?php echo $message ?></p>

    <!-- DISPLAY ROLLED DICE -->
    <div>
        <?php if ($numDice == NULL || $numSides == NULL) {
            $message = "Please enter both number of dice and number of sides. (modifier is optional)";
        } else if ((isset($_POST['roll-dice-form__btn-roll']) || isset($_POST['btn-roll-saved-dice'])) && $results !== NULL) : ?>
            <p>Number of Dice: <?php echo $numDice ?></p>
            <p>Number of Sides: <?php echo $numSides ?></p>
            <p>Modifier: <?php echo $modNum ?></p>
        <?php for ($i = 0; $i < $numDice; $i++) : ?>
            <p><?php echo 'roll: ' . $results[$i]; ?></p>
        <?php endfor; ?>
            <p><?php echo 'total: ' . $total = array_sum($results) ?></p>
            <p><?php echo 'total with modifier: ' . ($total + (int)$modNum) ?></p>
        <?php else : endif; ?>
    </div>

    <!-- VIEW SAVED DICE -->
    <div class="view-dice">
        <?php foreach ($viewSavedDice as $value) : ?>
            <form class="saved-dice-form" action="" method="post">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="hidden" name="saved-dice-form__quantity" value="<?php echo $value->quantity ?>" />
                            <input type="hidden" name="saved-dice-form__sides" value="<?php echo $value->sides ?>" />
                            <input type="hidden" name="saved-dice-form__modifier" value="<?php echo $value->modifier ?>" />
                            <input type="hidden" name="saved-dice-form__id" value="<?php echo $value->id ?>" />

                            <p><?php echo 'x' . $value->quantity . ' d' . $value->sides . ' ' . (($value->modifier > 0) ? '+' . $value->modifier :
                                $value->modifier) ?></p>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button name="saved-dice-form__btn-roll" type="button" class="btn btn-default">Roll </button>
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><button class="btn btn-default" type="submit" name="saved-dice-form__btn-edit">Edit</button></li>
                                            <li><button class="btn btn-default" type="submit" name="saved-dice-form__btn-delete">Delete</button></li>
                                        </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        <?php endforeach; ?>
    </div>

    <!-- EDIT DICE -->
    <?php if (isset($_POST['saved-dice-form__btn-edit'])) : ?>
        <div class="edit-dice">
            <form class="edit-dice-form" action="" method="POST">
                <div>
                    <input type="hidden" name="edit-dice-form__id" value="<?php echo $getDice->id ?>" />
                </div>
                <div>
                    <label for="edit-dice-form__quantity">Number of dice</label>
                    <input type="number" name="edit-dice-form__quantity" value="<?php echo $getDice->quantity ?>" />
                </div>
                <div>
                    <label for="edit-dice-form__sides">Number of sides</label>
                    <input type="number" name="edit-dice-form__sides" value="<?php echo $getDice->sides ?>" />
                </div>
                <div>
                    <label for="edit-dice-form__modifier">Modifier</label>
                    <input type="number" name="edit-dice-form__modifier" value="<?php echo $getDice->modifier ?>" />
                </div>
                <div>
                    <button type="submit" name="edit-dice-form__btn-update">Update Dice</button>
                </div>
            </form>
        </div>
    <?php endif; ?>
<script type="text/javascript" src="./script/dice.js"></script>
