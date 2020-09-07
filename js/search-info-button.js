$('document').ready(function(){
	$('body').on('click', '#admin-rent-button', function(){
		$.ajax({
			url: 'php/search-info-function.php',
			type: 'POST',
			data: ({ login: $('#user').val() }),
			dataType: 'text',
			success: admin_rent
		});
	});
	$('body').on('click', '.select-user', function(){
		$.ajax({
			url: 'php/user-info.php',
			type: 'POST',
			data: ({ fio: $('#user-name').text(), userID: $('#user-id').text(), userMail: $('#user-mail').text(), userPhone: $('#user-phone').text(), userStatus: $('#user-status').text(), userBalans: $('#user-balans').text() }),
			dataType: 'text',
			success: select_user
		});
	});

	function admin_rent(data){
		$('#findly-user').empty();
		$('#findly-user').append(data);
	}
	function select_user(data){
		$('#findly-user').empty();
		$('#findly-user').append(data);
	}
});