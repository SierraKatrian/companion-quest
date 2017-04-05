<?php

//keep modal open on registration error

    $modalOpen = "<script type='text/javascript'>
                    $(function showmodal(){
                        $('#navbar-register').modal('show');
                    });
                  </script>";

//assign variables

    $fname = "";
    $lname = "";
    $username = "";
    $email = "";
    $password = "";
    $confirmpassword = "";

//error messages

    $output_fname = "";
    $output_lname = "";
    $output_username = "";
    $output_email = "";
    $output_password = "";
    $output_confirmpassword = "";

//instance of Validation method

    require_once "./Models/Validation.php";
    $validator = new Validation();

//run code when register button is clicked

    if(isset($_POST['register'])) {

        //REASSIGN VARIABLES

            $fname = $_POST['registrationForm__fName'];
            $lname = $_POST['registrationForm__lName'];
            $username = $_POST['registrationForm__userName'];
            $password = $_POST['registrationForm__password'];
            $email = $_POST['registrationForm__email'];

        //VALIDATION

            if(isset($_POST['registrationForm__fName'])){

                //set and get values
                $validator->setText($_POST['registrationForm__fName']);
                $fname = $validator->getText();

                //validation
                $validator->validate_empty();
                $validator->validate_lengthmax20();
                $validator->validate_regexname();

                //output
                $output_fname = $validator->output;

            }

            if(isset($_POST['registrationForm__lName'])){

                //set and get values
                $validator->setText($_POST['registrationForm__lName']);
                $lname = $validator->getText();

                //validation
                $validator->validate_empty();
                $validator->validate_lengthmax20();
                $validator->validate_regexname();

                //output
                $output_lname = $validator->output;

            }

            if(isset($_POST['registrationForm__userName'])){

                //set and get values
                $validator->setText($_POST['registrationForm__userName']);
                $username = $validator->getText();

                //validation
                $validator->validate_empty();
                $validator->validate_lengthmax20();
                $validator->validate_lengthmin5();
                $validator->validate_regexusername();

                //output
                $output_username = $validator->output;

            }

            if(isset($_POST['registrationForm__email'])){

                //set and get values
                $validator->setText($_POST['registrationForm__email']);
                $email = $validator->getText();

                //validation
                $validator->validate_empty();
                $validator->validate_regexemail();

                //output
                $output_email = $validator->output;

            }

            if(isset($_POST['registrationForm__password'])){

                //set and get values
                $validator->setText($_POST['registrationForm__password']);
                $validator->setCompare($_POST['registrationForm__password']);
                $password = $validator->getText();

                //validation
                $validator->validate_empty();
                $validator->validate_lengthmax20();
                $validator->validate_lengthmin5();
                $validator->validate_regexpassword();
                $validator->validate_comparepassword();

                //output
                $output_password = $validator->output;

            }

            if(isset($_POST['registrationForm__confirmPassword'])){

                //set and get values
                $validator->setText($_POST['registrationForm__confirmPassword']);
                $password = $validator->getCompare();
                $confirmpassword = $validator->getText();

                //validation
                $validator->validate_empty();
                $validator->validate_lengthmax20();
                $validator->validate_lengthmin5();
                $validator->validate_regexpassword();
                $validator->validate_comparepassword();

                //output
                $output_confirmpassword = $validator->output;

            }

        //RUN AUTHENTICATION

            if ($validator->getError() == false) {

                //check for duplicate input values
                $userIsUnique = $UsersDAO->READ_CheckDuplicateUser($username, $email);

                if ($userIsUnique) {

                    //insert values into db
                    $userInput = $UsersDAO->CREATE_User($fname, $lname, $username, $password, $email);

                    if ($userInput) {

                        //sign in user
                        $userDetails = $UsersDAO->READ_SignInUser($email, $password);

                        if ($userDetails) {

                            //create session called "user"
                            $_SESSION['user'] = $userDetails;

                            header("Location: Main-Portal.php");
                            exit();

                        }

                    } else {

                        //reopen modal
                        echo $modalOpen;

                    }

                } else {

                    $output_username = "username and/or email already exist";
                    $output_email = "username and/or email already exist";

                    //reopen modal
                    echo $modalOpen;

                }

            } else {

                //reopen modal
                echo $modalOpen;

            }

    }//end of isset $_POST['register']

?>

<!-- REGISTER MODAL -->

<div id="navbar-register" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
            </div>

            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12">
                        <h2>Register</h2>
                        <p>Register to join and play or create a game</p>
                        <form action="./index.php" method="post" name="registrationForm">
                            <div class="form-group">
                                <label for="registrationForm__fName">First Name <span style="color:red;">*&nbsp;<?= $output_fname ?></span></label>
                                <input type="text" class="registrationForm__fName form-control" name="registrationForm__fName" value="<?= $fname ?>" />
                            </div>
                            <div class="form-group">
                                <label for="registrationForm__lName">Last Name <span style="color:red;">*&nbsp;<?= $output_lname ?></span></label>
                                <input type="text" class="registrationForm__lName form-control" name="registrationForm__lName" value="<?= $lname ?>" />
                            </div>
                            <div class="form-group">
                                <label for="registrationForm__userName">Username <span style="color:red;">*&nbsp;<?= $output_username ?></span></label>
                                <input type="text" class="registrationForm__userName form-control" name="registrationForm__userName" value="<?= $username ?>" />
                            </div>
                            <div class="form-group">
                                <label for="registrationForm__email">Email <span style="color:red;">*&nbsp;<?= $output_email ?></span></label>
                                <input type="text" class="registrationForm__email form-control" name="registrationForm__email" value="<?= $email ?>" />
                            </div>
                            <div class="form-group">
                                <label for="registrationForm__password">Password <span style="color:red;">*&nbsp;<?= $output_password ?></span></label>
                                <input type="password" class="registrationForm__password form-control" name="registrationForm__password" value="<?= $password ?>" />
                            </div>
                            <div class="form-group">
                                <label for="registrationForm__confirmPassword">Confirm Password <span style="color:red;">*&nbsp;<?= $output_confirmpassword ?></span></label>
                                <input type="password" class="registrationForm__confirmPassword form-control" name="registrationForm__confirmPassword" value="<?= $confirmpassword ?>" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="register" value="Register!" />
                            </div>
                        </form>
                    </div><!--end of col-md-12-->

                </div><!--end of row-->
            </div><!--end of modal body-->

        </div><!--end of modal content-->
    </div><!--end of modal dialog-->
</div><!--end of modal-->