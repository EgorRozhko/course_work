<?php
	include_once('connect.php');
	$query1 = 'SELECT * FROM accounts WHERE email="'.$_POST['email'].'" OR phone="'.$_POST['phone'].'"';
	if (mysqli_num_rows(mysqli_query($connection, $query1)) == 0)
	{
		$query = 'INSERT INTO accounts(`name`, `surname`, `patronomyc`, `email`, `phone`, `password`, `activation`) VALUES ("'.$_POST['name'].'","'.$_POST['surname'].'","'.$_POST['patronomyc'].'", "'.$_POST['email'].'", "'.$_POST['phone'].'", "'.$_POST['password'].'", "false")';
		if (mysqli_query($connection, $query))
		{
			$link = '/success.php/?email='.$_POST['email'];
			$message = 'При регистрации аккаунта на сайте: <название сайта> указали Ваш адрес электронной почты.<br /> Для активации этого аккаунта проследуйте по данной ссылке: '.$link.'. Если же Вы не регистрировали аккаунт, то проигнорируйте данное сообщение';
			$to = $_POST['email'];
			$from = 'rozhko.egorka@gmail.com';
			$subject = 'Активация аккаунта';
			$subject = "=?utf-8?B?".base64_encode($subject)."?=";
			$headers = "From: $from\r\nReplay-to: $from\r\nContent-type:text/plain; charset=utf-8\r\n";
			mail($to, $subject, $message, $headers);
			echo  'true';
		}
		mysqli_close($connection);
	}
	else echo 'Аккаунт с такими данными уже зарегистрирован';
?>