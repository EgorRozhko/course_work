$('document').ready(function(){
	$('body').on('click', '.button-close', function(){
		$('.background').empty();
		$('.background').css({'display':'none'});
	});
});