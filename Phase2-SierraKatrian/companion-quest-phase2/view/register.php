<?php
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
                                <form action="main-portal.php" method="post" name="registrationForm">
                                    <div class="form-group">
                                        <label for="registrationForm__fName">First Name:</label>
                                        <span class="registrationForm__fName_fNameError" value=""></span>
                                        <input type="text" class="registrationForm__fName form-control" name="registrationForm__fName" />
                                    </div>
                                    <div class="form-group">
                                        <label for="registrationForm__lName">Last Name:</label>
                                        <input type="text" class="registrationForm__lName form-control" name="registrationForm__lName" />
                                        <span class="registrationForm__lName_lNameError" value=""></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="registrationForm__userName">User Name:</label>
                                        <input type="text" class="registrationForm__userName form-control" name="registrationForm__userName" />
                                        <span class="registrationForm__userName_userNameError" value=""></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="registrationForm__password">Password:</label>
                                        <input type="password" class="registrationForm__password form-control" name="registrationForm__password" />
                                        <span class="registrationForm__password_passwordError" value=""></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="registrationForm__confirmPassword">Confirm Password:</label>
                                        <input type="password" class="registrationForm__confirmPassword form-control" name="registrationForm__confirmPassword" />
                                        <span class="registrationForm__password_confirmPasswordError" value=""></span>                                                    
                                    </div>
                                    <div class="form-group">
                                        <label for="registrationForm__email">Email:</label>
                                        <input type="email" class="registrationForm__email form-control" name="registrationForm__email" />
                                        <span class="registrationForm__email_emailError" value=""></span>      
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