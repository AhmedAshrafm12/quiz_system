



$('.polit img').click(function(){
  $('.board').val($(this).data('board'));
  $(this).parent().siblings().children().removeClass('active');
  $(this).addClass('active');
})


window.onload=function(){
  $('.nameInput').focus();
}
