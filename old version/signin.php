<?php

require_once "Database/DbConnect.php";
require_once "Database/DbQuery1.php";

//modal

    $modalOpen = "";

//variables to hold input values

    $email = "";
    $password = "";

//error messages

    $output_email = "";
    $output_password = "";

//instance of Validation method

    $validator = new Validation();

//on form submit

    if(isset($_POST['signIn'])){

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

        if($validator->getError() == false){

            $read_SignInUser = new DbQuery1();
            $email = $_POST['signInForm__email'];
            $password = $_POST['signInForm__password'];
            $signInUser = $read_SignInUser->READ_AuthenticateUser($email, $password);

            if ($signInUser) {
                $_SESSION['user'] = $signInUser;
                header("Location: main-portal.php?");
                exit();
            } else {
                $output_email = "incorrect email/password";
                $output_password = "incorrect email/password";

                $modalOpen = "<script type='text/javascript'>
                            $(function showmodal(){
                                $('#SignInModal').modal('show');
                            });
                         </script>";

                echo $modalOpen;
            }

        } else {

            //javascript code to keep modal open on form submit

            $modalOpen = "<script type='text/javascript'>
                            $(function showmodal(){
                                $('#SignInModal').modal('show');
                            });
                         </script>";

            echo $modalOpen;
        }

    }

?>

<!-- SIGN IN MODAL -->

<div id="SignInModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
            </div> <!-- END OF MODAL HEADER -->
                <div class="modal-body">   
                    <div class="container-fluid">

                        <!-- FORM -->

                        <div class="signin row">

                            <div class="col-md-12">
                                <h1>Sign-In</h1>
                                <p>Sign in to your account</p>
                                <form action="" method="post" name="signInForm">
                                    <div class="form-group">
                                        <label for="signInForm__email">Email <span style="color:red;">*&nbsp;<?php echo $output_email?></span></label>
                                        <input type="text" class="signInForm__email form-control" name="signInForm__email" value="<?php echo htmlspecialchars($email)?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="signInForm__password">Password <span style="color:red;">*&nbsp;<?php echo $output_password?></span></label>
                                        <input type="password" class="signInForm__password form-control" name="signInForm__password"  value="<?php echo htmlspecialchars($password)?>" />
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" name="signIn" value="Sign-In!" />
                                    </div>
                                </form>
                            </div>

                        </div> <!-- END of signin row -->

                    </div> <!-- END of container-fluid -->
                </div> <!-- END OF MODAL BODY -->
        </div> <!-- END OF MODAL CONTENT -->
    </div> <!-- END OF MODAL DIALOGUE -->
</div> <!-- END OF MODAL -->