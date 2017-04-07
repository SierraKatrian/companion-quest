<?php

//keep modal open on registration error

    $modalOpen = "<script type='text/javascript'>
                        $(function showmodal(){
                            $('#navbar-signin').modal('show');
                        });
                  </script>";

//assign variables

    if(!empty($_SESSION['user'])){
        $userDetails = $_SESSION['user'];
        $fname = $userDetails['f_name'];
        $lname = $userDetails['l_name'];
        $username = $userDetails['user_name'];
        $email = $userDetails['email'];
        $password = $userDetails['password'];
    }

//error messages

    $output_fname = "";
    $output_lname = "";
    $output_username = "";
    $output_email = "";
    $output_password = "";
    $output_confirmpassword = "";

//DELETE account

    if(isset($_POST['delete-yes'])){

        $email = $userArray['email'];

        //sign in user
        $deleteUser = $UsersDAO->DELETE_User($email);
        //var_dump($deleteUser);

        unset($_SESSION['user']);
        $_SESSION = array();
        session_destroy();
        $goToIndex="<script type='text/javascript'>location.replace('index.php'); </script>";
        echo $goToIndex;

        exit();
    }

//UPDATE account

    if(isset($_POST['edit-yes'])){

        $currentEmail = $userArray['email'];

    }

?>

<!-- EDIT MODAL -->

<div id="navbar-edit" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
            </div>

            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12">
                        <h2>Edit</h2>
                        <p>Edit your details</p>
                        <form action="" method="post" name="editForm">
                            <div class="form-group">
                                <label for="registrationForm__fName">First Name <span style="color:red;">*&nbsp;<?php ?></span></label>
                                <input type="text" class="registrationForm__fName form-control" name="registrationForm__fName" value="<?php echo $fname ?>" />
                            </div>
                            <div class="form-group">
                                <label for="registrationForm__lName">Last Name <span style="color:red;">*&nbsp;<?php  ?></span></label>
                                <input type="text" class="registrationForm__lName form-control" name="registrationForm__lName" value="<?php echo $lname ?>" />
                            </div>
                            <div class="form-group">
                                <label for="registrationForm__userName">Username <span style="color:red;">*&nbsp;<?php  ?></span></label>
                                <input type="text" class="registrationForm__userName form-control" name="registrationForm__userName" value="<?php echo $username ?>" />
                            </div>
                            <div class="form-group">
                                <label for="registrationForm__email">Email <span style="color:red;">*&nbsp;<?php  ?></span></label>
                                <input type="text" class="registrationForm__email form-control" name="registrationForm__email" value="<?php echo $email ?>" />
                            </div>
                            <div class="form-group">
                                <label for="registrationForm__password">Password <span style="color:red;">*&nbsp;<?php  ?></span></label>
                                <input type="password" class="registrationForm__password form-control" name="registrationForm__password" value="" />
                            </div>

                            <div class="edit-button-options">

                                <div class="navbar-edit-save">
                                    <div class="navbar-edit-save-confirm">
                                        <div class="navbar-edit-save-message">
                                            <h4>Are you sure you want to</h4>
                                            <h4>UPDATE your account?</h4>
                                        </div>
                                        <div class="navbar-edit-save-buttons">
                                            <input type="submit" class="btn btn-primary navbar-edit-save-yes" name="edit-yes" value="YES" />
                                            <button type="button" class="btn btn-primary navbar-edit-save-no">NO</button>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary navbar-edit-save-btn">
                                        <span class="glyphicon glyphicon-floppy-disk"></span>
                                    </button>
                                </div>

                                <div class="navbar-edit-delete">
                                    <div class="navbar-edit-delete-confirm">
                                        <div class="navbar-edit-delete-message">
                                            <h4>Are you sure you want to</h4>
                                            <h4>DELETE your account?</h4>
                                        </div>
                                        <div class="navbar-edit-delete-buttons">
                                            <button type="button" class="btn btn-danger navbar-edit-delete-no">NO</button>
                                            <a href="index.php"><button type="submit" class="btn btn-danger navbar-edit-delete-yes" name="delete-yes">YES</button></a>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-danger navbar-edit-delete-btn">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </div>

                            </div>
                        </form>

                    </div><!--end of col-md-12-->

                </div><!--end of row-->
            </div><!--end of modal body-->

        </div><!--end of modal content-->
    </div><!--end of modal dialog-->
</div><!--end of modal-->












