$(function(){
  $('.banner #down').click(function(){
  	var bh=$('.banner').height();
  	$('html,body').animate({scrollTop : bh},400);
  });
  $(".to-top").click(function(){
  	$('html,body').animate({scrollTop:0},400);
  })
  $("[data-toggle='tooltip']").tooltip();
});
$(window).scroll(function(){
		var h=$(window).scrollTop();
		var bh=$('.banner').height()-10;
		if(h>bh){
			$('.navbar').css('background','rgba(33,33,33,0.8)');
			$('.fixedSideBar').css('display','block');
		}else{
			$('.navbar').css('background','rgba(0,0,0,0.2)');
			$('.fixedSideBar').css('display','none');
		}
	});
