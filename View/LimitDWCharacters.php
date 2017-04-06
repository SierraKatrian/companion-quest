<?php
require_once './Models/DbConnect.php';
require_once './Models/AvailCharactersDAO.php';

$dbClass = new DbConnect();
$db = $dbClass->getDB();

$rbID = 2;
$gameID = 1;
$availCharClass = new AvailCharactersDAO();
$dwAvailChars = $availCharClass->getAvailCharacters($db, $rbID);
?>

    <!-- Dungeon World Characters -->
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row all-avail-chars">
                <?php foreach ($dwAvailChars as $availChars): ?>
                    <div class="col-sm-2 col-xs-3 character-thumb-container">
                        <label for="<?php echo $availChars->role_name; ?>">
                            <input id="<?php echo $availChars->role_name; ?>" class="character-chk" type="checkbox" name="availChars[]" value="<?php echo $availChars->id; ?>" />
                                <img class="character-img"  src="./Images/dungeon-world-characters/<?php echo $availChars->picture; ?>" />
                                <p><?php echo $availChars->role_name; ?></p>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div><!-- end of row -->
        </div><!-- end of panel-body -->
    </div><!--end of panel panel-default-->
