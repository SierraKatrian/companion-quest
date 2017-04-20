<?php

//assign VARIABLES

    $selectedMap = "";
    $mapErrorMessage = "";

//call database query classes
    //MAPS
    $MapsDAO = new MapsDAO($db);
    $selectedMapArray = $MapsDAO->READ_SelectedMap($gameID);
    //assign selected map ID
    $selectedMapID = $selectedMapArray[0]['id'];


//default map IMAGE

    $defaultMapImage = '<span id="default-map-image"></span>';

    // //delete selected map
    //
    // if(isset($_POST['delete-map'])) {
    //     $MapsDAO->DELETE_SelectedMap($gameID);
    // }

?>

<div id="gm-portal-maps" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--close button-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
            </div>

            <!--modal content-->
            <div class="modal-body">
                <div class="container-fluid">

                      <div class="row">

                          <!--UPLOAD MAP-->
                          <div class="col-md-6 upload-map-container">
                              <h2>Upload</h2>
                              <p>Add maps to your games</p>
                              <form action="" method="post" name="mapsForm" id="mapsForm" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <input type="file" class="form-control" id="map-upload-file" name="mapsForm__upload"/>
                                  </div>
                                  <div class="form-group">
                                      <input type="submit" class="btn btn-primary" id="map-upload-btn" name="map-upload" value="upload"/>
                                      <span style='color:red;' class="upload-map-error-message"></span>
                                  </div>
                              </form>
                          </div>

                          <!--CURRENT MAP-->

                          <form action="" method="post" id="deleteSelectedMapForm" class="col-md-6 current-map-container">
                                  <h2>
                                  Current Map
                                  <button type="submit" name="delete-map" id="delete-map-btn-ID" class="btn btn-danger square-button delete-map-btn" data-toggle="tooltip" data-placement="bottom" title="Delete Map">
                                      <span class="glyphicon glyphicon-trash"></span>
                                  </button>
                                  </h2>
                              <div id="current-map">
                                  <img src="Images/maps/default-map.png" alt="map" class="map-image default-map-image" style="width:100%">
                              </div>
                          </form>

                    </div><!--end of row-->

                      <!--image gallery-->

                      <div class="row">
                          <div class="col-md-12 gallery-map-container">
                              <h2>Gallery</h2>
                              <p>Select and view uploaded maps</p>
                          <form action="" method="post" name="galleryForm" id="galleryForm">
                              <!--this holds the images for the gallery-->
                              <div id="image-output" class="col-md-12 mapsModal__imageSelect"></div>
                          </form>
                          </div>
                      </div>

                </div><!--END OF CONTAINER-->
            </div> <!-- END OF MODAL BODY -->
        </div> <!-- END OF MODAL CONTENT -->
    </div> <!-- END OF MODAL DIALOGUE -->
</div> <!-- END OF MODAL -->

<!-- <script type="text/javascript" src="Script/Maps/populate-gallery-AJAX.js"></script> -->
<script type="text/javascript" src="Script/Maps/update-selected-map-AJAX.js"></script>
<script type="text/javascript" src="Script/Maps/upload-map-AJAX.js"></script>
<script type="text/javascript" src="Script/Maps/delete-map-AJAX.js"></script>
