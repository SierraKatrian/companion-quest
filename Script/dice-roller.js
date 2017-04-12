$(document).ready(function(){
    // alert("connected");
    // GETS CHAR SPECIFIC DICE
    function viewSavedDice(){
        $.getJSON('./Models/View-Dice.php', function(data){
            var dice = '';
            $.each(data, function(index, savedDice){
                dice += '<tr><td>' + savedDice.quantity + '</td> <td>' + savedDice.sides + '</td><td>' + savedDice.modifier + '</td> <td><input type="number" id="' + savedDice.id + '" name="edit-dice-form__id" value="' + savedDice.id + '" /> <input id="savedQuantity" type="hidden" name="quantity" value="' + savedDice.quantity + '" /><input id="savedSides" type="hidden" name="sides" value="' + savedDice.sides + '" /> <input id="savedModifier" type="hidden" name="modifier" value="' + savedDice.modifier + '" /><div class="btn-group"><button id="btn_roll_saved" name="saved-dice-form__btn-roll" type="button" class="btn btn-default" value="' + savedDice.id + '">Roll </button><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button><ul class="dropdown-menu" role="menu"> <li><button id="btn_edit" class="btn btn-default" type="button" name="btn-edit" value="' + savedDice.id + '">Edit</button></li> <li><button id="btn_delete" class="btn btn-default" type="button" name="btn-delete" value="' + savedDice.id + '">Delete</button></li></ul></div></td></tr>';
            });
            $('#dice-saved').html(dice);
        });
    }

    viewSavedDice();

    // ROLLS DICE FROM FORM
    $('#main-dice-form').on('click', '#btn_roll', function() {
            var id = $('#id').val();
            var quantity = $('#quantity').val();
            var sides = $('#sides').val();
            var modifier = $('#modifier').val();
            var roll = "";
            var breakdown = "";
            var totalValues = "";
            var result = "";
            var total = [];
            function randRoll(sides){
                var randNum = Math.floor(Math.random()*sides + 1);
                return randNum;
            };
            function getSum(value) {
                    result = total.push(value);
                return result;
            }
            $.post('', {id : id, quantity : quantity, sides : sides, modifier : modifier}, function(data){
                    breakdown = "<p>Number of dice: " + quantity + "</p><p>Number of sides: " + sides + "</p><p>Modifier: " + modifier + "</p>";
                    for (var i = 0; i < quantity; i++) {
                        getSum(parseInt(randRoll(sides)));
                        roll += "<p>ROLL: " + total[i] + "</p>";
                    }
                    totalValues = "<p>Total without modifier: " + total.reduce(
                        function(total, num){ return total + num } , 0) + "</p><p>Total with modifier: " + (total.reduce(
                        function(total, num){ return total + num } , 0) + parseInt(modifier)) + "</p>"
                $('#breakdown').html(breakdown);
                $('#rolls').html(roll);
                $('#totals').html(totalValues);
            });
        });

        // SAVE NEW DICE
        $('#main-dice-form').on('click', '#btn_save', function() {
            var id = $('#id').val();
            var quantity = $('#quantity').val();
            var sides = $('#sides').val();
            var modifier = $('#modifier').val();
            $.post('./Models/Save-Dice.php', {id : id, quantity : quantity, sides : sides, modifier : modifier}, function(data){
                viewSavedDice()
            });
        });

        // DELETE SAVED DICE
        $('#char-dice-form').on('click', '#btn_delete', function() {
            var id = $(this).val();
            console.log(id);
            $.post('./Models/Delete-Dice.php', {id : id}, function(data){
                viewSavedDice()
            });
        });

        // dice += '<tr><td>' + savedDice.quantity + '</td> <td>' + savedDice.sides + '</td><td>' + savedDice.modifier + '</td> <td><input type="number" id="' + savedDice.id + '" name="edit-dice-form__id" value="' + savedDice.id + '" /> <input id="savedQuantity" type="hidden" name="quantity" value="' + savedDice.quantity + '" /><input id="savedSides" type="hidden" name="sides" value="' + savedDice.sides + '" /> <input id="savedModifier" type="hidden" name="modifier" value="' + savedDice.modifier + '" /><div class="btn-group"><button id="btn_roll_saved" name="saved-dice-form__btn-roll" type="button" class="btn btn-default" value="' + savedDice.id + '">Roll </button><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button><ul class="dropdown-menu" role="menu"> <li><button id="btn_edit" class="btn btn-default" type="button" name="btn-edit" value="' + savedDice.id + '">Edit</button></li> <li><button id="btn_delete" class="btn btn-default" type="button" name="btn-delete" value="' + savedDice.id + '">Delete</button></li></ul></div></td></tr>';

        $('#char-dice-form').on('click', '#btn_roll_saved', function() {
                var id = $(this).val();
                console.log(id);
                var quantity = $('#savedQuantity').val();
                console.log(quantity);
                var sides = $('#savedSides').val();
                console.log(sides);
                var modifier = $('#savedModifier').val();
                console.log(modifier);
                var roll = "";
                var breakdown = "";
                var totalValues = "";
                var result = "";
                var total = [];
                function randRoll(sides){
                    var randNum = Math.floor(Math.random()*sides + 1);
                    return randNum;
                };
                function getSum(value) {
                        result = total.push(value);
                    return result;
                }
                $.post('', {id : id, quantity : quantity, sides : sides, modifier : modifier}, function(data){
                        breakdown = "<p>Number of dice: " + quantity + "</p><p>Number of sides: " + sides + "</p><p>Modifier: " + modifier + "</p>";
                        for (var i = 0; i < quantity; i++) {
                            getSum(parseInt(randRoll(sides)));
                            roll += "<p>ROLL: " + total[i] + "</p>";
                        }
                        totalValues = "<p>Total without modifier: " + total.reduce(
                            function(total, num){ return total + num } , 0) + "</p><p>Total with modifier: " + (total.reduce(
                            function(total, num){ return total + num } , 0) + parseInt(modifier)) + "</p>"
                    $('#breakdown').html(breakdown);
                    $('#rolls').html(roll);
                    $('#totals').html(totalValues);
                });
            });

        //EDIT SAVED DICE
        // ('#char-dice-form').on('click', '#btn_edit', function() {
        //     // var id = $(this).val();
        //     // console.log(id);
        //     // var quantity = $('#quantity').val();
        //     // var sides = $('#sides').val();
        //     // var modifier = $('#modifier').val();
        //         viewSavedDice()
        //     });
});
