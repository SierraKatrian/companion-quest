<?php

require_once './Models/DbConnect.php';
require_once './Models/DiceDAO.php';

$dbClass = new DbConnect();
$db = $dbClass->getDB();

$numDice = $numSides = $modNum = $message = '';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h3>Dice Roller</h3>
            <!-- ROLL DICE -->
            <form class="roll-dice-form form-horizontal" action="" method="post" id="main-dice-form">
                <div class="form-group">
                    <input id="id" type="hidden" name="roll-dice-form__char-id" value="<?php echo $charID ?>" />
                </div>

                <!-- QUANTITY OF DICE -->
                <div class="form-group">
                    <label class="control-label col-xs-7" for="roll-dice-form__quantity">Quantity</label>
                    <div class="col-xs-5">
                        <input id="quantity" class="form-control" type="number" name="roll-dice-form__quantity" value="<?php echo $numDice ?>" />
                    </div>
                </div>

                <!-- NUMBER OF SIDES -->
                <div class="form-group">
                    <label class="control-label col-xs-7" for="roll-dice-form__sides">Sides</label>
                    <div class="col-xs-5">
                        <input id="sides" class="form-control" type="number" name="roll-dice-form__sides" value="<?php echo $numSides ?>" />
                    </div>
                </div>

                <!-- MODIFIER -->
                <div class="form-group">
                    <label class="control-label col-xs-7" for="roll-dice-form__modifier">Modifier</label>
                    <div class="col-xs-5">
                        <input id="modifier" class="form-control" type="number" name="roll-dice-form__modifier" value="<?php echo $modNum ?>" />
                    </div>
                </div>
                <div class="roll-btns btn-group">

                    <!-- ROLL DICE BUTTON -->
                    <button id="btn_roll" class="btn btn-info" type="button" name="roll-dice-form__btn-roll">Roll Dice</button>

                    <!-- SAVE DICE BUTTON -->
                    <button id="btn_save" class="btn btn-info" type="button" name="roll-dice-form__btn-save"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                </div>

            </form>
            <p id="results"></p>

            <div id="breakdown">

            </div>
            <div id="rolls">

            </div>
            <div id="totals">

            </div>

            <!-- EDIT DICE FORM -->
            <!-- <?php if (isset($_POST['saved-dice-form__btn-edit'])) : ?>
                <div class="edit-dice">
                    <form id="char-dice-form" class="edit-dice-form" action="" method="POST"> -->

                        <!-- ID OF DICE TO BE EDITED -->
                        <!-- <div>
                            <input type="hidden" name="edit-dice-form__id" value="<?php echo $getDice->id ?>" />
                        </div> -->

                        <!-- QUANTITY OF DICE TO BE EDITED -->
                        <!-- <div>
                            <label for="edit-dice-form__quantity">Number of dice</label>
                            <input type="number" name="edit-dice-form__quantity" value="<?php echo $getDice->quantity ?>" />
                        </div> -->

                        <!-- NUMBER OF SIDES OF DICE TO BE EDITED -->
                        <!-- <div>
                            <label for="edit-dice-form__sides">Number of sides</label>
                            <input type="number" name="edit-dice-form__sides" value="<?php echo $getDice->sides ?>" />
                        </div> -->

                        <!-- MODIFIER OF DICE TO BE EDITED -->
                        <!-- <div>
                            <label for="edit-dice-form__modifier">Modifier</label>
                            <input type="number" name="edit-dice-form__modifier" value="<?php echo $getDice->modifier ?>" />
                        </div> -->

                        <!-- UPDATE DICE BUTTON -->
                        <!-- <div>
                            <button type="submit" name="edit-dice-form__btn-update">Update Dice</button>
                        </div>
                    </form>
                </div>
            <?php endif; ?> -->

            <!-- DISPLAY ROLLED DICE -->
        <form id="char-dice-form" action="" method="post">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Q</th>
                        <th>S</th>
                        <th>M</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody id="dice-saved">

                </tbody>

            </table>
        </form>
    </body>
</html>
