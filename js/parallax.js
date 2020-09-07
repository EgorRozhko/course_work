$(document).ready(function(){
	$(window).scroll(function(){
		$('.about-us-elements').css({'top': -$(window).scrollTop()/3});
	});
});