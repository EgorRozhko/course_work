$('document').ready(function(){
	$('body').on('click', '.add-order', function(){
		$.ajax({
			url: 'php/transport-list.php',
			type: 'POST',
			dataType: 'text',
			success: show_transport_list
		});
	});
	$('body').on('click','#select-adress-button',function(){
		$.ajax({
			url: 'php/show_transport.php',
			type: 'POST',
			dataType: 'text',
			data: {select_adress: $('#select-adress').find('option:selected').data('adress-id') },
			success: show_transport
		});
	});
	function show_transport(data){
		$('#background').empty();
		$('#background').append(data);
	}
	function show_transport_list(data){
		if (data == "Чтобы добавить заказ необходимо авторизоваться.") {
			alert(data);
		}
		else {
			$('#background').css({ 'display':'block' });
			$('#background').empty();
			$('#background').append(data);
		}
	};
});