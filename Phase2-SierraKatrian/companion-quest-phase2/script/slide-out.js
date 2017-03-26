$(document).ready(function() {

    $('.slideout_btn').click(function(){
    //   $('.slideout').toggleClass('on');
      $(this).next('.slideout').toggleClass('on');
    });
    $('.close').click(function(){
        $('.slideout').removeClass('on');
    });

});
