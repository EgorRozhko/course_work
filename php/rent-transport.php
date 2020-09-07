<?php
	include('connect.php');
	echo '
	<title>Арендованный транспорт</title>
	<script type="text/javascript" src="js/search-button.js"></script>
	<link rel="stylesheet" href="css/rent-transport.css"/>
	<h1>Аренодованный транспорт</h1>';
	$query1 = mysqli_query($connection, 'SELECT * FROM (transport INNER JOIN orders ON orders.transport_id = transport.id) INNER JOIN accounts ON orders.user_id = accounts.ID WHERE orders.finish = 0');
	if (mysqli_num_rows($query1) == 0) echo 'Нет арендованного транспорта';
	else
	{
		while ($row = mysqli_fetch_array($query1))
		{
			echo "
			<div id='block'>
				<div id='user-info'>
					<p class='user-name' id=$row[ID]>Имя пользователя: $row[name] $row[surname] $row[patronomyc]</p>
					<p>E-mail: $row[email]</p>
					<p>Номер телефона: $row[phone]</p>
					<p class='balans' id=$row[balans]>Баланс на счету: $row[balans]</p>
					<p class='transport-title' id=$row[transport_id]>Транспорт: $row[title] №$row[transport_id]</p>
					<p>Начало аренды: <span class='date-start'>$row[date_start]</span></p>
				</div>
				<div id='stop-rent-box'>
					<p id='end-rent'>Завершить аренду</p>
				</div>
			</div><hr>";
		}
	}
	mysqli_close($connection);
?>