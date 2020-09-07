$('document').ready(function(){
	$('body').on('click', '.cancel_rent', function(){
		$.ajax({
			url: 'php/cancel-rent.php',
			dataType: 'text',
			type: 'POST',
			data: ({ transport_id: this.id }),
			success: cancel_rent
		});
	});
	function cancel_rent(data){
		$('#content-order').empty();
		$('#content-order').append(data);
	}
});