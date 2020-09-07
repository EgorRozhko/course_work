<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Спасибо за регистрацию</title>
	<link rel="stylesheet" href="/css/style_success.css">
</head>
<body>
	<div id="head-cont">
		<p><a href="/index.php">Вернуться на главную страницу</a></p>
		<h1>Спасибо за регистрацию.</h1>
	</div>
	<div id="image-cont"><img src="/images/icons/tick.svg" alt=""></div>
	<?php
		include 'php/connect.php';
		$sql = 'SELECT * FROM accounts WHERE email="'.$_GET['email'].'"';
		$query = mysqli_query($connection, $sql);
		$row = mysqli_fetch_array($query);
		if ($row['activation'] == '1')
		{
			$answer = 'Аккаунт уже был ранее активирован';
			mysqli_free_result($query);
			mysqli_close($connection);
		}
		else
		{
			$answer = 'Аккаунт был успешно активирован';
			$sql1 = 'UPDATE accounts SET `activation`=1 WHERE email="'.$_GET['email'].'"';
			mysqli_query($connection, $sql1);
			mysqli_free_result($query);
			mysqli_close($connection);
		}
	?>
	<h3><?php echo $answer; ?></h3>
</body>
</html>