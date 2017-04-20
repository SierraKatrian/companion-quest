$('.slideout_btn').click(function(){
  $(this).next('.slideout').toggleClass('on');
});

$('.close').click(function(){
    $('.slideout').removeClass('on');
});
