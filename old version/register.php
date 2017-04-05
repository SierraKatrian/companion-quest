<?php

require_once "Database/DbConnect.php";
require_once "Database/DbQuery1.php";

//modal

    $modalOpen = "";

//variables to hold input values

    $fname = "";
    $lname = "";
    $username = "";
    $password = "";
    $confirmpassword = "";
    $email = "";

//error messages

    $output_fname = "";
    $output_lname = "";
    $output_username = "";
    $output_password = "";
    $output_confirmpassword = "";
    $output_email = "";

//instance of Validation method

    require_once "Validation.php";
    $validator = new Validation();

//on form submit

    if(isset($_POST['register'])){

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


        if ($validator->getError() == false){

            $add_RegisterUser = new DbQuery1();
            $email = $_POST['registrationForm__email'];
            $password = $_POST['registrationForm__password'];

            $checkDuplicateUser = $add_RegisterUser->READ_checkDuplicates();

            if($checkDuplicateUser == true){

                $registerUser = $add_RegisterUser->CREATE_RegisterUser();
                $signInUser = $add_RegisterUser->READ_AuthenticateUser($email, $password);

                if($signInUser){

                    $_SESSION['user'] = $signInUser;
                    header("Location: main-portal.php?");
                    exit();

                } else {

                    $modalOpen = "<script type='text/javascript'>
                            $(function showmodal(){
                                $('#RegisterModal').modal('show');
                            });
                         </script>";

                    echo $modalOpen;
                }


            } else {

                $output_username = "username and/or email already exist";
                $output_email = "username and/or email already exist";

                $modalOpen = "<script type='text/javascript'>
                            $(function showmodal(){
                                $('#RegisterModal').modal('show');
                            });
                         </script>";

                echo $modalOpen;

            }

        } else {

            $modalOpen = "<script type='text/javascript'>
                            $(function showmodal(){
                                $('#RegisterModal').modal('show');
                            });
                         </script>";

            echo $modalOpen;

        }
    }

?>

<!-- REGISTER MODAL -->

<div id="RegisterModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
            </div>
                <div class="modal-body">   
                    <div class="container-fluid">

                        <!-- FORM -->

                        <div class="signin row">

                            <div class="col-md-12">
                                <h1>Register</h1>
                                <p>Register to join or create a game</p>
                                <form action="index.php" method="post" name="registrationForm">
                                    <div class="form-group">
                                        <label for="registrationForm__fName">First Name <span style="color:red;">*&nbsp;<?php echo $output_fname?></span></label>
                                        <input type="text" class="registrationForm__fName form-control" name="registrationForm__fName" value="<?php echo htmlspecialchars($fname)?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="registrationForm__lName">Last Name <span style="color:red;">*&nbsp;<?php echo $output_lname?></span></label>
                                        <input type="text" class="registrationForm__lName form-control" name="registrationForm__lName" value="<?php echo htmlspecialchars($lname)?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="registrationForm__userName">Username <span style="color:red;">*&nbsp;<?php echo $output_username?></span></label>
                                        <input type="text" class="registrationForm__userName form-control" name="registrationForm__userName" value="<?php echo htmlspecialchars($username)?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="registrationForm__email">Email <span style="color:red;">*&nbsp;<?php echo $output_email?></span></label>
                                        <input type="text" class="registrationForm__email form-control" name="registrationForm__email" value="<?php echo htmlspecialchars($email)?>" />
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="registrationForm__password">Password <span style="color:red;">*&nbsp;<?php echo $output_password?></span></label>
                                        <input type="password" class="registrationForm__password form-control" name="registrationForm__password" value="<?php echo htmlspecialchars($password)?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="registrationForm__confirmPassword">Confirm Password <span style="color:red;">*&nbsp;<?php echo $output_confirmpassword?></span></label>
                                        <input type="password" class="registrationForm__confirmPassword form-control" name="registrationForm__confirmPassword" value="<?php echo htmlspecialchars($confirmpassword)?>" />
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" name="register" value="Register!" />                                                    
                                    </div>
                                </form>
                            </div>
                            
                        </div> <!-- END of register row -->

                    </div> <!-- END of container-fluid -->
                </div> <!-- END OF MODAL BODY -->
        </div> <!-- END OF MODAL CONTENT -->
    </div> <!-- END OF MODAL DIALOGUE -->
</div> <!-- END OF MODAL -->