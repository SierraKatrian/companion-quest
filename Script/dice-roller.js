$(document).ready(function(){
    // alert("connected");
    // GETS CHAR SPECIFIC DICE
    $.getJSON('./Models/View-Dice.php', function(data){
        var dice = '';
        $.each(data, function(index, savedDice){
            dice += '<tr><td>' + savedDice.quantity + '</td> <td>' + savedDice.sides + '</td><td>' + savedDice.modifier + '</td> <td><input type="number" id="' + savedDice.id + '" name="edit-dice-form__id" value="' + savedDice.id + '" /> <input type="hidden" name="edit-dice-form__quantity" value="' + savedDice.quantity + '" /><input type="hidden" name="edit-dice-form__sides" value="' + savedDice.sides + '" /> <input type="hidden" name="edit-dice-form__modifier" value="' + savedDice.modifier + '" /><div class="btn-group"><button name="saved-dice-form__btn-roll" type="button" class="btn btn-default">Roll </button><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button><ul class="dropdown-menu" role="menu"> <li><button id="btn_edit" class="btn btn-default" type="button" name="btn-edit" value="' + savedDice.id + '">Edit</button></li> <li><button id="btn_delete" class="btn btn-default" type="button" name="btn-delete" value="' + savedDice.id + '">Delete</button></li></ul></div></td></tr>';
        });
        $('#dice-saved').html(dice);
    });
    // ROLLS DICE FROM FORM
    // $('#btn_roll').click(function(){

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
                    // console.log(totalValues);
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
                // $('#result').html(data);
                $.getJSON('./Models/View-Dice.php', function(data){
                    var dice = '';
                    $.each(data, function(index, savedDice){
                        dice += '<tr><td>' + savedDice.quantity + '</td> <td>' + savedDice.sides + '</td><td>' + savedDice.modifier + '</td> <td><input type="number" id="' + savedDice.id + '" name="edit-dice-form__id" value="' + savedDice.id + '" /> <input type="hidden" name="edit-dice-form__quantity" value="' + savedDice.quantity + '" /><input type="hidden" name="edit-dice-form__sides" value="' + savedDice.sides + '" /> <input type="hidden" name="edit-dice-form__modifier" value="' + savedDice.modifier + '" /><div class="btn-group"><button name="saved-dice-form__btn-roll" type="button" class="btn btn-default">Roll </button><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button><ul class="dropdown-menu" role="menu"> <li><button id="btn_edit" class="btn btn-default" type="button" name="btn-edit" value="' + savedDice.id + '">Edit</button></li> <li><button id="btn_delete" class="btn btn-default" type="button" name="btn-delete" value="' + savedDice.id + '">Delete</button></li></ul></div></td></tr>';
                    });
                    $('#dice-saved').html(dice);
                });
            });
        });

        // DELETE SAVED DICE
        $('#char-dice-form').on('click', '#btn_delete', function() {
            var id = $(this).val();
            console.log(id);
            $.post('./Models/Delete-Dice.php', {id : id}, function(data){
                $.getJSON('./Models/View-Dice.php', function(data){
                    var dice = '';
                    $.each(data, function(index, savedDice){
                        dice += '<tr><td>' + savedDice.quantity + '</td> <td>' + savedDice.sides + '</td><td>' + savedDice.modifier + '</td> <td><input type="number" id="' + savedDice.id + '" name="edit-dice-form__id" value="' + savedDice.id + '" /> <input type="hidden" name="edit-dice-form__quantity" value="' + savedDice.quantity + '" /><input type="hidden" name="edit-dice-form__sides" value="' + savedDice.sides + '" /> <input type="hidden" name="edit-dice-form__modifier" value="' + savedDice.modifier + '" /><div class="btn-group"><button name="saved-dice-form__btn-roll" type="button" class="btn btn-default">Roll </button><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button><ul class="dropdown-menu" role="menu"> <li><button id="btn_edit" class="btn btn-default" type="button" name="btn-edit" value="' + savedDice.id + '">Edit</button></li> <li><button id="btn_delete" class="btn btn-default" type="button" name="btn-delete" value="' + savedDice.id + '">Delete</button></li></ul></div></td></tr>';
                    });
                    $('#dice-saved').html(dice);
                });
            });
        });

        //EDIT SAVED DICE
        // ('#char-dice-form').on('click', '#btn_edit', function() {
        //     // var id = $(this).val();
        //     // console.log(id);
        //     // var quantity = $('#quantity').val();
        //     // var sides = $('#sides').val();
        //     // var modifier = $('#modifier').val();
        //         $.getJSON('./Models/Get-Dice.php', function(data){
        //             var dice = '';
        //             $.each(data, function(index, savedDice){
        //                 dice += '<tr><td>' + savedDice.quantity + '</td><td>' + savedDice.sides + '</td><td>' + savedDice.modifier + '</td><td><input type="number" id="' + savedDice.id + '" name="edit-dice-form__id" value="' + savedDice.id + '" /><input type="hidden" name="edit-dice-form__quantity" value="' + savedDice.quantity + '" /><input type="hidden" name="edit-dice-form__sides" value="' + savedDice.sides + '" /><input type="hidden" name="edit-dice-form__modifier" value="' + savedDice.modifier + '" /><div class="btn-group"><button name="saved-dice-form__btn-roll" type="button" class="btn btn-default">Roll </button><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button><ul class="dropdown-menu" role="menu"><li> <button class="btn btn-default" type="button" name="saved-dice-form__btn-edit">Edit</button></li> <li><button id="btn_delete" class="btn btn-default" type="button" name="btn-delete" value="' + savedDice.id + '">Delete</button></li></ul></div></td></tr>';
        //             });
        //             $('.edit-dice').html(dice);
        //         });
        //     });
});
