$('document').ready(function(){
	$('body').on('click', '#logout', function(){
		$.ajax({
			url: 'php/logout.php',
			success: logout
		});
	});
	$('body').on('click', '#active-orders-button', function(){
		$(location).attr("href", '../create_order.php');
	});

	$('body').on('click', '#active-reserved-transport-button', function(){
		$(location).attr("href", '../create_order.php');
	});

	$('body').on('click', '#settings', function(){
		$(location).attr("href", '../user_settings.php');
	});

	$('body').on('click', '#apanel', function(){
		$(location).attr("href", '../admin_panel.php');
	});

	$('body').on('click', '#support-system', function(){
		$(location).attr("href", '../page.php?file=support');
	});

	$('body').on('click', '#history-orders', function(){
		$(location).attr("href", '../page.php?file=history-orders');
	});

	function logout(){
		$(location).attr("href", '../index.php');
	}

	function change_phone(data){
		$('body').append(data);
	}
});