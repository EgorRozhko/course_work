<?php
	include('connect.php');
	$login = false;
	$sql = 'SELECT * FROM accounts WHERE email="'.$_POST['email'].'"';
	$query = mysqli_query($connection, $sql);
	if (mysqli_num_rows($query) == 0) echo "Аккаунт с таким email-адресом не зарегистрирован. <a href='reg.php'>Зарегистрироваться.</a>";
	else
	{
		$row = mysqli_fetch_array($query);
		if($row['password'] != $_POST['password']) echo "Не верный пароль. <a href='#'>Забыли пароль?</a>";
		else if($row['activation'] == 0) echo 'Данный аккаунт ещё не активирован, чтобы его активировать перейдите по ссылке отправленной Вам на указанный адрес электронной почты. Если же письмо не пришло, проверьте папку "Спам" или <a href="#">Напишите сюда</a>';
		else
		{
			$sql1 = 'SELECT * FROM reserved_transport WHERE id_user='.$row['ID'];
			$sql2 = 'SELECT * FROM orders WHERE finish = 0 AND user_id='.$row['ID'];
			$query1 = mysqli_query($connection, $sql1);
			$query2 = mysqli_query($connection, $sql2);
			setcookie('login', $_POST['email'], time()+60*60*24*365, '/');
			setcookie('id', $row['ID'], time()+60*60*24*365, '/');
			setcookie('balans', $row['balans'], time()+60*60*24*365, '/');
			setcookie('reserved_transport', mysqli_num_rows($query1), time()+60*60*24*365, '/');
			setcookie('active_orders', mysqli_num_rows($query2), time()+60*60*24*365, '/');
			setcookie('phone', $row['phone'], time()+ 60 * 60 * 24 * 365, '/');
			setcookie('password', $row['password'], time() + 60 * 60 * 24 * 365, '/');
			setcookie('admin', $row['admin'], time() + 60 * 60 * 24 * 365, '/');
			mysqli_free_result($query1);
			mysqli_free_result($query2);
			if ($row['admin'] == 0) echo 'true';
			else
			{
				setcookie('office_id', $row['office_id'], time() + 60 * 60 * 24 * 365, '/');
				echo "admin";
			}
		}
	}
	mysqli_free_result($query);
	mysqli_close($connection);
?>