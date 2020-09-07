<?php
	include('connect.php');
	$sql = 'SELECT * FROM accounts WHERE email="'.$_COOKIE['login'].'"';
	$query = mysqli_query($connection, $sql);
	$row = mysqli_fetch_array($query);
	$query1 = mysqli_query($connection, 'SELECT * FROM support WHERE `contact`="'.$row['email'].'" AND `user_check`=0');
	echo '
	<title>Служба поддержки</title>
	<script type="text/javascript" src="js/search-button.js"></script>
	<link rel="stylesheet" href="css/support.css">
	<div>
		<h2>Сообщение для службы подддержки:</h2>
		<div id="send-message-box">
			<label>Тема сообщения:</label><input id="theme-of-message" type="text"/>
			<label>Сообщение:</label><textarea id="message"></textarea>
		</div>
		<p id="submit-box"><span id="submit">Отправить</span></p>
		<p id="warning-support"></p>
	</div>
	<hr>
	<h2>Новые ответы:</h2>';
	while($row1 = mysqli_fetch_array($query1))
	{
		echo "
			<div id='message-box'>
				<p id='message-id'>#$row1[id]</p>
				<p id='message-theme'>Тема сообщения: $row1[theme]</p>
				<p class='read-new-message' id=$row1[id]>Прочесть</p>
			</div>
		";
	}
	mysqli_close($connection);
?>