<?php
	include('connect.php');
	echo '<title>История заказов</title>
	<link rel="stylesheet" href="css/history-order.css">
	<h1>История заказов</h1>
	<hr>';
	$query = mysqli_query($connection, 'SELECT * FROM orders WHERE `user_id`= '.$_COOKIE['id'].' AND `finish`=1');
	while($row = mysqli_fetch_array($query))
	{
		echo "
		<div id='order-block'>
			<p class='order-id'>Номер заказа: $row[id]</p>
			<p class='order-start'>Начало аренды: $row[date_start]</p>
			<p class='order-end'>Конец аренды: $row[date_finish]</p>
			<p class='order-cost'>Стоимомть аренды: $row[cost] руб.</p>
		</div>
		<hr class='border-order'>
			";
	}
	mysqli_close($connection);
?>