$('document').ready(function(){
	$('body').on('click', '#change-password', function(){
		$('.warning').text('');
		if ($('#old-password').val() == '' || $('#new-password').val() == '' || $('#new_password_confirm').val() == '')
		{
			$('#warning-password').removeClass('warning-success');
			$('#warning-password').addClass('warning-error');
			$('#warning-password').text('Заполните все поля, пожалуйста');
		}
		else
		{
			$.ajax({
				url: 'php/change-password.php',
				type: 'POST',
				dataType: 'text',
				data: ({ current_password: $('#old-password').val(), new_password: $('#new-password').val(), new_password_confirm: $('#new-password-confirm').val() }),
				success: change_password
			});
		}
		$('.field').val('');
	});
	function change_password(data){
		let arr = data.split('!');
		if (arr[0] == 'e01')
		{
			$('#warning-password').removeClass('warning-success');
			$('#warning-password').text(arr[1]);
			$('#warning-password').addClass('warning-error');
		}
		else if(arr[0] == 'e02')
		{
			$('#warning-password').removeClass('warning-success');
			$('#warning-password').text(arr[1]);
			$('#warning-password').addClass('warning-error');
		}
		else
		{
			$('#warning-password').removeClass('warning-error');
			$('#warning-password').addClass('warning-success');
			$('#warning-password').text(arr[1]);
		}
	}
});