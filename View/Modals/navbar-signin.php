<?php

//keep modal open on registration error

    $modalOpen = "<script type='text/javascript'>
                    $(function showmodal(){
                        $('#navbar-signin').modal('show');
                    });
                  </script>";

//assign variables

    $email = "";
    $password = "";

//error messages

    $output_email = "";
    $output_password = "";

//on form submit

    if (isset($_POST['signIn'])) {

        //VALIDATION

            if(isset($_POST['signInForm__email'])){

                //set and get values
                $validator->setText($_POST['signInForm__email']);
                $email = $validator->getText();

                //validation
                $validator->validate_empty();
                $validator->validate_regexemail();

                //output
                $output_email = $validator->output;

            }

            if(isset($_POST['signInForm__password'])){

                //set and get values
                $validator->setText($_POST['signInForm__password']);
                $password = $validator->getText();

                //validation
                $validator->validate_empty();
                $validator->validate_lengthmax20();
                $validator->validate_lengthmin5();
                $validator->validate_regexpassword();

                //output
                $output_password = $validator->output;

            }

        //AUTHENTICATION

            if($validator->getError() == false){

                $email = $_POST['signInForm__email'];
                $password = $_POST['signInForm__password'];

                //sign in user
                $signInUser = $UsersDAO->READ_SignInUser($email, $password);

                if($signInUser){

                    //create session called "user"
                    $_SESSION['user'] = $signInUser;
                    header("Location: Main-Portal.php");
                    exit();

                } else {

                    $output_email = "incorrect email/password";
                    $output_password = "incorrect email/password";

                    //reopen modal
                    echo $modalOpen;

                }

            } else {

                //reopen modal
                echo $modalOpen;

            }

    }

?>

<!-- SIGN IN MODAL -->

<div id="navbar-signin" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
            </div>

            <div class="modal-body">
                <div class="row">

                        <div class="col-md-12">
                            <h1>Sign-In</h1>
                            <p>Sign in to your account</p>
                            <form action="./index.php" method="post" name="signInForm">
                                <div class="form-group">
                                    <label for="signInForm__email">Email <span style="color:red;">*&nbsp;<?= $output_email ?></span></label>
                                    <input type="text" class="signInForm__email form-control" name="signInForm__email" value="<?= $email ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="signInForm__password">Password <span style="color:red;">*&nbsp;<?= $output_password ?></span></label>
                                    <input type="password" class="signInForm__password form-control" name="signInForm__password"  value="<?= $password ?>" />
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="signIn" value="Sign In!" />
                                </div>
                            </form>
                        </div><!--end of col-md-12-->

                </div> <!--end of row-->
            </div> <!--end of modal body-->

        </div> <!--end of modal content-->
    </div> <!--end of modal dialog-->
</div><!--end of modal-->
