$('document').ready(function(){
	$('body').on('click', '#change-phone', function(){
		$('.warning').text('');
		if ($('#new-phone').val() == '' || $('#old-phone').val() == '')
		{
			$('#warning-phone').text('');
			$('#warning-phone').removeClass('warning-success');
			$('#warning-phone').append('Заполните все поля, пожалуйста');
			$('#warning-phone').addClass('warning-error');
		}
		else {
			$.ajax({
				url: 'php/change-phone-function.php',
				type: 'POST',
				dataType: 'text',
				data: ({ new_phone: $('#new-phone').val(), old_phone: $('#old-phone').val() }),
				success: change_phone
			});
		}
		$('.field').val('');
	});
	function change_phone(data)
	{
		$('#warning-phone').text('');
		$('#warning-phone').removeClass('warning-error');
		$('#warning-phone').append(data);
		$('#warning-phone').addClass('warning-success');
	}
});