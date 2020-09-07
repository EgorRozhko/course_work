$('document').ready(function(){
	var openMenu = false;
	$('#user-block').on('click','.user_name', function(){
		if (openMenu == false) {
			$.ajax({
				url:'components/show-user-menu.php',
				dataType: 'text',
				success: show_menu
			});
			openMenu = true;
		}
		else{
			$('#user-short-menu').empty();
			$('#triangle').removeClass('triangle-rotate');
			$('#user-short-menu').removeClass('b');
			openMenu = false;
		}
	});
	$("#user-block").on('click','#triangle', function(){
		if (openMenu == false) {
			$.ajax({
				url:'components/show-user-menu.php',
				dataType: 'text',
				success: show_menu
			});
			openMenu = true;
		}
		else{
			$('#user-short-menu').empty();
			$('#triangle').removeClass('triangle-rotate');
			$('#user-short-menu').removeClass('b');
			openMenu = false;
		}
	});
	$('#user-short-menu, #user-block').on('mouseleave',function(){
		$('#user-short-menu').empty();
		$('#triangle').removeClass('triangle-rotate');
		$('#user-short-menu').removeClass('b');
		openMenu = false;
	});
	function show_menu(data){
		$('#user-short-menu').append(data);
		$('#user-short-menu').css({'margin-top': $('#user-block').css('height'), 'margin-left': '30px'});
		$('#triangle').addClass('triangle-rotate');
		$('#user-short-menu').addClass('b');
	};
});