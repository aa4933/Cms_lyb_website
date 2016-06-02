
$('.qiehuan_t').hover(function(){
  var index = $(this).index();
  $(this).addClass('ghover').siblings().removeClass('ghover');
  $('.tabcon').eq(index).show().addClass('active').siblings().removeClass('active').hide();
});
$('.menubtn').click(function(){
 $('.shouM').addClass('block');
 $('.shouM').removeClass('no');
});
$('.menud').click(function(){
 $('.shouM').addClass('no');
 $('.shouM').removeClass('block');
});
