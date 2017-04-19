
<div id="AvatarModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
            </div>
                <div class="modal-body">   
                    <div class="container-fluid">
                        <!-- IMAGES SELECT -->

                        <div class="imageselect row">
                            
                            <div id="output" class="col-md-12 avatarModal__imagesSelect"> 
                            
                             
                            </div>

                        </div>

                        <!-- FORM -->

                        <div class="signin row">

                            <div class="col-md-12">
                                <h1>Avatar</h1>
                                <p>Choose your in game avatar or upload your avatar image</p>
                                <form action="avatar.php" method="post" name="avatarForm" id="img-form" enctype="multipart/form-data" >
                                    <div class="form-group">
                                        <label for="avatarForm__upload">Choose a file:</label>
                                        <span class="avatarForm__upload_uploadError" value=""></span>
                                        <input type="file" class="avatarForm__upload form-control" name="avatarForm__upload" id="avatarForm__upload" />
                                        <div id="confirmation"></div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" name="upload" value="Upload" />                                                    
                                    </div>


                                </form>
                            </div>
                            
                        </div> <!-- END of register row -->

                        <div id="test"></div>

                    </div> <!-- END of container-fluid -->
                </div> <!-- END OF MODAL BODY -->
        </div> <!-- END OF MODAL CONTENT -->
    </div> <!-- END OF MODAL DIALOGUE -->
</div> <!-- END OF MODAL -->

<script type="text/javascript" src="Script/show-avatar-ajax.js"></script>
<script type="text/javascript" src="Script/upload-image-ajax.js"></script>
