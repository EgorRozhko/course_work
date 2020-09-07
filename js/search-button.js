$('document').ready(function(){
	$('body').on('click', '#admin-rent-button', function(){
		$.ajax({
			url: 'php/search-function.php',
			type: 'POST',
			data: ({ login: $('#user').val() }),
			dataType: 'text',
			success: admin_rent
		});
	});
	$('body').on('click', '#admin-res-button', function(){
		$.ajax({
			url: 'php/search-function2.php',
			type: 'POST',
			data: ({ login: $('#user').val() }),
			dataType: 'text',
			success: admin_rent
		});
	});
	$('body').on('click', '.create-res', function(){
		$.ajax({
			url: 'php/res-after-search.php',
			type: 'POST',
			dataType: 'text',
			data:({user_id: this.id, transport_id: $('.title-transport').attr('id')}),
			success: res
		});
	});

	$('body').on('click', '.create-rent', function(){
		$.ajax({
			url: 'php/rent-after-search.php',
			type: 'POST',
			dataType: 'text',
			data:({user_id: this.id, transport_id: $('.title-transport').attr('id')}),
			success: create_rent
		});
	});

	$('body').on('click', '.remove-transport-button', function(){
		$.ajax({
			url: 'php/remove-transport-function.php',
			type: 'POST',
			dataType: 'text',
			data:({ transport_id: this.id}),
			success: remove_transport
		});
	});

	$('body').on('click', '.cancel-admin-reserved', function(){
		$.ajax({
			url: 'php/cancel-admin-reserved.php',
			type: 'POST',
			dataType: 'text',
			data:({ transport_id: this.id}),
			success: cancel_admin_reserved
		});
	});

	$('body').on('click', '.create-admin-rent', function(){
		$.ajax({
			url: 'php/create-admin-rent.php',
			type: 'POST',
			dataType: 'text',
			data:({ transport_id: this.id}),
			success: create_admin_rent
		});
	});

	$('body').on('click', '#end-rent', function(){
		$.ajax({
			url: 'php/end-rent.php',
			type: 'POST',
			dataType: 'text',
			data:({ date_start: $('.date-start').text(), transport_id: $('.transport-title').attr('id'), user_id: $('.user-name').attr('id'), balans: $('.balans').attr('id') }),
			success: end_rent
		});
	});

	$('body').on('click', '#submit', function(){
		if ($('#theme-of-message').val() == '')
		{
			$('#warning-support').removeClass('warning-support-success');
			$('#warning-support').addClass('warning-support-error');
			$('#warning-support').text('Введите тему сообщения');
		}
		else if($('#message').val() == '')
		{
			$('#warning-support').text('Введите сообщение');
			$('#warning-support').removeClass('warning-support-success');
			$('#warning-support').addClass('warning-support-error');
		}
		else
		{
			$.ajax({
				url: 'php/support-function.php',
				type: 'POST',
				dataType: 'text',
				data:({ message:$('#message').val(), themeOfMessage: $('#theme-of-message').val() }),
				success: support_function
			});
		}
	});
	$('body').on('click', '.read-message', function(){ $(location).attr('href', 'page.php?file=check-message&id='+this.id); });
	$('body').on('click', '.read-new-message', function(){ $(location).attr('href', 'page.php?file=read-new-message&id='+this.id); });
	function support_function(data)
	{
		$('#warning-support').removeClass('warning-support-error');
		$('#warning-support').addClass('warning-support-success');
		$('#warning-support').text(data);
		$('#message').val('');
		$('#theme-of-message').val('');
	}
	function end_rent(data) { $(location).attr('href', 'page.php?file=rent-transport'); }
	function create_rent(data)
	{
		if (data == '!') alert("У данного пользователя уже забронировано или арендовано 3 транспортных средства");
		else
		{
			$('#findly-user').empty();
			$('#row-reserved-transport').empty();
			$('#user').val('');
			$('#warning').val('');
			$(location).attr('href','page.php?file=free-transport');
		}
	}
	function res(data)
	{
		if (data == '!') alert("У данного пользователя уже забронировано или арендовано 3 транспортных средства");
		else
		{
			$('#findly-user').empty();
			$('#row-reserved-transport').empty();
			$('#user').val('');
			$('#warning').val('');
			$(location).attr('href','page.php?file=free-transport');
		}
	}
	function admin_rent(data){
		$('#findly-user').empty();
		$('#findly-user').append(data);
	}

	function remove_transport(data)
	{
		$('#block').empty();
		$('#block').append(data);
	}

	function cancel_admin_reserved(data)
	{
		$('#block').empty();
		$('#block').append(data);
	}

	function create_admin_rent(data)
	{
		$(location).attr('href', 'page.php?file=admin-reserved-transport');
	}
});