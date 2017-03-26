<?php
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
                                <form action="main-portal.php" method="post" name="signInForm">
                                    <div class="form-group">
                                        <label for="signInForm__username">Username:</label>
                                        <input type="text" class="signInForm__username form-control" name="signInForm__username" />
                                        <span class="signInForm__username_usernameError" value=""></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="signInForm__password">Password:</label>
                                        <input type="password" class="signInForm__password form-control" name="signInForm__password" />
                                        <span class="signInForm__password_usernameError" value=""></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" name="submit" value="Sign-In!" />                                                    
                                    </div>
                                </form>
                            </div>

                        </div> <!-- END of signin row -->

                    </div> <!-- END of container-fluid -->
                </div> <!-- END OF MODAL BODY -->
        </div> <!-- END OF MODAL CONTENT -->
    </div> <!-- END OF MODAL DIALOGUE -->
</div> <!-- END OF MODAL -->