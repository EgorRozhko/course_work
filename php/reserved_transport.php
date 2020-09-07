<?php
	if(isset($_COOKIE['id']) && isset($_COOKIE['login']) && isset($_COOKIE['balans']) && isset($_COOKIE['reserved_transport']))
	{
		if($_COOKIE['balans'] > 0)
		{
			if(($_COOKIE['reserved_transport'] + $_COOKIE['active_orders']) < 3)
			{
				include('connect.php');
				$sql = 'INSERT INTO reserved_transport(`id_user`, `id_transport`) VALUES('.$_COOKIE["id"].', '.$_POST["id_transport"].')';
				$query = mysqli_query($connection, $sql);
				$query2 = mysqli_query($connection, 'UPDATE transport SET `reserved`=1 WHERE id='.$_POST['id_transport']);
				mysqli_close($connection);
				setcookie('reserved_transport', $_COOKIE['reserved_transport'] + 1, time()+60*60*24*365, '/');
				echo "true";
			}
			else echo 'Ошибка!Нельзя одновременно бронировать и арендовать более 3-х транспортных средств';
		}
		else echo 'Ошибка!Нельзя бронирование транспорта аренду при нулевом или отрицательном балансе';
	}
	else echo 'Ошибка!Не удалось оформить бронирование транспорта. Возможно у Вас в браузере отключены COOKIE. Или Вы не авторизованы.';
?>