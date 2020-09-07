$('document').ready(function(){
	$('.field').val('');
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
		else
		{
			$.ajax({
				url: 'php/autorisation.php',
				type: 'POST',
				dataType: 'text',
				data: { email: $('#email').val(), password: $('#password').val() },
				success: insert_record
			});
		}
	});
	function insert_record(data)
	{
		if(data == 'admin')$(location).attr("href",'../admin_panel.php');
		else if(data == 'true') $(location).attr('href', '../index.php');
		else $("#warning").append(data);
	}
});