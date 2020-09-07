$('document').ready(function(){
	$('body').on('click', '#add-transport', function(){
		$(location).attr('href', 'page.php?file=add-transport');
	});
	$('body').on('click', '#free-transport', function(){
		$(location).attr('href', 'page.php?file=free-transport');
	});
	$('body').on('click', '#delete-transport', function(){
		$(location).attr('href', 'page.php?file=remove-transport');
	});
	$('body').on('click', '#admin-reserved-transport', function(){
		$(location).attr('href', 'page.php?file=admin-reserved-transport');
	});
	$('body').on('click', '#order-button', function(){
		$(location).attr('href', 'page.php?file=rent-transport');
	});
	$('body').on('click', '#feedback-button', function(){
		$(location).attr('href', 'page.php?file=admin-support');
	});
});