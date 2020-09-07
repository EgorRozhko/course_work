<?php
	include('connect.php');
	$query = mysqli_query($connection, 'SELECT * FROM support WHERE `answer` IS NULL');
	echo "
	<title>Новые обращения</title>
	<script type='text/javascript' src='js/search-button.js'></script>
	<link rel='stylesheet' href='css/admin-support.css'>
	<h1>Служба поддержки</h1><hr>";
	while($row = mysqli_fetch_array($query))
	{
		echo "
	<div id='block-message'>
		<p id='message-id' class='info'>#$row[id]</p>
		<p id='message-theme' class='info'>Тема сообщения: $row[theme]</p>
		<p id='message-contact' class='info'>Отправитель: $row[contact]</p>
		<p class='read-message' id=$row[id]>Ответить</p>
	</div>
		";
	}
	mysqli_close($connection);
?>