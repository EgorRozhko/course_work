$('document').ready(function(){
	$('body').on('click', '#submit-message', function(){
		if($('#theme').val() == '')
		{
			$('#warning-main-support').text('Введите тему сообщения');
			$('#warning-main-support').removeClass('warning-main-support-success');
			$('#warning-main-support').addClass('warning-main-support-error');
		}
		else if($('#contact').val() == '')
		{
			$('#warning-main-support').text('Введите Ваш e-mail или номер телефона для связи');
			$('#warning-main-support').removeClass('warning-main-support-success');
			$('#warning-main-support').addClass('warning-main-support-error');
		}
		else if($('#message').val() == '')
		{
			$('#warning-main-support').text('Введите сообщение для службы поддержки');
			$('#warning-main-support').removeClass('warning-main-support-success');
			$('#warning-main-support').addClass('warning-main-support-error');
		}
		else
		{
			$.ajax({
				url: 'php/main-support.php',
				type: 'POST',
				data: ({
					theme: $('#theme').val(),
					contact: $('#contact').val(),
					message: $('#message').val()
				}),
				dataType: 'text',
				success: success_support
			});
		}
	});
	function success_support(data){
		$('#warning-main-support').text(data);
		$('#warning-main-support').addClass('warning-main-support-success');
		$('#warning-main-support').removeClass('warning-main-support-error');
		$('.support-field').val('');
	}
});