$('document').ready(function(){
	$('body').on('click', '.rent-button', function(){
		console.log(this.id);
		$.ajax({
			url: 'php/rent-free-transport.php',
			type: 'POST',
			data: ({ id_transport: this.id }),
			dataType: 'text',
			success: rent_function
		});
	});
	$('body').on('click', '.res-button', function(){
		$.ajax({
			url: 'php/reserved_transport.php',
			type: 'POST',
			data: ({ id_transport: this.id }),
			dataType: 'text',
			success: res_function
		});
	});
	function rent_function(data){
		let arr = data.split('!');
		if(arr[0] == 'Ошибка') alert(arr[1]);
		else $(location).attr('href','../create_order.php');
	};
	function res_function(data){
		let arr = data.split('!');
		if(arr[0] == 'Ошибка') alert(arr[1]);
		else $(location).attr('href','../create_order.php');
	}
});