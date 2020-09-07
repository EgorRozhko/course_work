<?php
	include('connect.php');
	mysqli_query($connection, 'UPDATE support SET `user_check`=1 WHERE `id`='.$_GET['id']);
	$query = mysqli_query($connection, 'SELECT * FROM support WHERE `id`='.$_GET['id']);
	$row = mysqli_fetch_array($query);
	echo "
	<title>$row[theme]</title>
	<link rel='stylesheet' href='css/read-new-message.css'>
	<p><a id='back-button' href='../page.php?file=support'>Назад</a></p>
	<div id='message-box'>
		<p>Тема сообщения: $row[theme]</p>
		<p>Сообщение: $row[message]</p>
		<p>Ответ: $row[answer]</p>
	</div>
		";
	mysqli_close($connection);
?>