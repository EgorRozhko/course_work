$('document').ready(function(){
	$('body').on('click', '.admin-rent-button', function(){
		$(location).attr('href', 'page.php?file=search&type=rent&transport-id='+this.id);
	});
	$('body').on('click', '.admin-res-button', function(){
		$(location).attr('href', 'page.php?file=search&type=res&transport-id='+this.id);
	});
});