$('document').ready(function(){
	$('body').on('click','.reserved-button', function(){
		$.ajax({
			url: 'php/reserved_transport.php',
			type: 'POST',
			dataType: 'text',
			data: { transport_id: this.id },
			success: answer_reserved
		});
	});
	function answer_reserved(data){
		if(data == 'true')  $(location).attr("href",'../index.php');
		else alert(data);
	}
});