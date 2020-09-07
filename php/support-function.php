<?php
	$message = trim($_POST['message']);
	$message = stripslashes($message);
	$themeOfMessage = trim($_POST['themeOfMessage']);
	$themeOfMessage = stripslashes($themeOfMessage);
	include('connect.php');
	mysqli_query($connection, 'INSERT INTO support(`theme`, `message`, `contact`) VALUES("'.$themeOfMessage.'", "'.$message.'", "'.$_COOKIE['login'].'")');
	echo "Ваше сообщение было успешно доставлено";
	mysqli_close($connection);
?>