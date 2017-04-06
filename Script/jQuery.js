$( document ).ready(function() {

    //HIDING AND SHOWING EDIT-SAVE BUTTON

    $(".navbar-edit-save-btn").click(function(){

        $(".navbar-edit-save-btn").hide();
        $(".navbar-edit-save-confirm").show();

        $(".navbar-edit-delete-btn").hide();
        $(".navbar-edit-delete-confirm").hide();

    });

    $(".navbar-edit-save-no").click(function(){

        $(".navbar-edit-save-confirm").hide();
        $(".navbar-edit-save-btn").show();

        $(".navbar-edit-delete-btn").show();

    });

    //HIDING AND SHOWING EDIT-DELETE BUTTON

    $(".navbar-edit-delete-btn").click(function(){

        $(".navbar-edit-delete-btn").hide();
        $(".navbar-edit-delete-confirm").show();

        $(".navbar-edit-save-btn").hide();
        $(".navbar-edit-save-confirm").hide();

    });

    $(".navbar-edit-delete-no").click(function(){

        $(".navbar-edit-delete-confirm").hide();
        $(".navbar-edit-delete-btn").show();

        $(".navbar-edit-save-btn").show();

    });

    //TOOL TIP

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
});
