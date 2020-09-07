$('document').ready(function(){
	$('body').on('click', '.first-button', function(){
		$.ajax({
			url: 'php/events-reserved-transport.php',
			type: 'POST',
			data: ({ id_transport: this.id }),
			dataType: 'text',
			success: success_function
		});
	});
	$('body').on('click', '.second-button', function(){
		$.ajax({
			url: 'php/cancel_reserved.php',
			type: 'POST',
			data: ({ id_transport: this.id }),
			dataType: 'text',
			success: cancel_reserved
		});
	});
	function success_function(data){
		if (data == "true") { $(location).attr("href",'../create_order.php'); }
		else alert(data);
	};
	function cancel_reserved(data){ $(location).attr("href", '../create_order.php'); }
});