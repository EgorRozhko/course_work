$('document').ready(function(){
	$('h4').on('click',function(){
		var form = document.querySelector('.formWithValidation');
		var fields = form.querySelectorAll('.field');
		var ids = Array.prototype.filter.call(fields, function(fields){ return fields.id; });
		var error = false;
		$('#warning').empty();
		for (var i = 0; i < fields.length; i++)
		{
			if (fields[i].value == '')
			{
				var error = true;
				$('#'+ids[i].getAttribute('id')).addClass('error-field');
			}
		}
		if (error == true) { $('#warning').append('Не все поля заполнены'); }
		else if($('#password').val() !== $('#confirm-password').val()) { $('#warning').append('Пароли не одинаковы'); }
		else
		{
			$.ajax({
				url: 'php/registration.php',
				type: 'POST',
				dataType: 'text',
				data: { name: $('#name').val(), surname: $('#surname').val(), patronomyc: $('#patronomyc').val(), email: $('#email').val(), phone: $('#phone').val(), password: $('#password').val(), activation: false },
				success: insert_record
			});
		}
	});
	$('#email').on('click', function(){
		let coords = this.getBoundingClientRect();
		let x = coords.x;
		$('#popup').css({'top':x, 'left': $('#reg-block').css('width'), 'display': 'block'})
	});
	function insert_record(data)
	{
	if (data != 'true') $("#warning").append(data);
		else $(location).attr("href",'../index.php');
	}
});