$('document').ready(function(){
	$('#warning').val('');
	$('body').on('click', '#add-transport-button', function(){
		$('#warning').val('');
		var form = document.querySelector('.add-transport-fields');
		var fields = form.querySelectorAll('.field');
		var ids = Array.prototype.filter.call(fields, function(fields){ return fields.id; });
		var error = false;
		$('#warning').empty();
		for (var i = 0; i < fields.length; i++)
		{
			if (fields[i].value == '') var error = true;
		}
		if (error == true)
		{
			$('#warning').append('Не все поля заполнены');
			$('#warning').removeClass('warning-success');
			$('#warning').addClass('warning-error');
		}
		else
		{
			$.ajax({
				url: 'php/admin/add-transport-function.php',
				type: 'POST',
				dataType: 'text',
				data: ({ transport_type: $('#transport-type').find('option:selected').data('transport-type'), max_weight: $('#max-weight').val(), max_speed: $('#max-speed').val(), power_engine: $('#power-engine').val(), mileage_single_charge: $('#mileage-single-charge').val(), color: $('#color').val(), cost: $('#cost').val() }),
				success: add_transport_function
			});
		}
	});

	function add_transport_function(data)
	{
		$('.field').val('');
		$('#warning').append(data);
		$('#warning').removeClass('warning-error');
		$('#warning').addClass('warning-success');
	}
});