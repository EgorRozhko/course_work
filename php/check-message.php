<?php
	include('connect.php');
	$query = mysqli_query($connection, 'SELECT * FROM support WHERE id='.$_GET['id']);
	$row = mysqli_fetch_array($query);
	echo "
	<script type='text/javascript' src='js/answer-for-user.js'></script>
	<link rel='stylesheet' href='css/check-message.css'>
	<title>$row[theme]</title>
	<div id='block-message'>
		<div id='head-box'>
			<span id='message-id'>#$row[id]</span>
			<span id='message-theme'>Тема сообщения: $row[theme]</span>
		</div>
		<p id='message-contact'>Отправил: $row[contact]</p>
		<p id='message-text'>Сообщение: $row[message]</p>

		<hr>
	</div>
	<div id='answer-box'>
		<div>
			<label>Введите ответ на сообщение:</label>
			<textarea id='answer-text'></textarea>
		</div>
		<p class='answer-for-user-box' id=$row[id]><span class='answer-for-user'>Ответить</span></p>
	</div>
	<p id='warning-support'></p>
	";
	mysqli_free_result($query);
	mysqli_close($connection);
?>