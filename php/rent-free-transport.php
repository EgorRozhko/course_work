<?php
	if(isset($_COOKIE['id']) && isset($_COOKIE['login']) && isset($_COOKIE['balans']) && isset($_COOKIE['reserved_transport']))
	{
		if($_COOKIE['balans'] > 0)
		{
			if(($_COOKIE['reserved_transport'] + $_COOKIE['active_orders']) < 3)
			{
				include('connect.php');
				$sql = 'INSERT INTO orders(`user_id`, `transport_id`, `date_start`) VALUES('.$_COOKIE["id"].', '.$_POST["id_transport"].', "'.date("Y-n-j H:i").'")';
				$query = mysqli_query($connection, $sql);
				$query2 = mysqli_query($connection, 'UPDATE transport SET `in_order`=1 `reserved`=1 WHERE id='.$_POST['id_transport']);
				mysqli_close($connection);
				setcookie('active_orders', $_COOKIE['active_orders'] + 1, time()+60*60*24*365, '/');
				echo 'true';
			}
			else echo 'Ошибка!Нельзя одновременно бронировать и арендовать более 3-х транспортных средств';
		}
		else echo 'Ошибка!Нельзя оформить аренду при нулевом или отрицательном балансе';
	}
	else echo 'Ошибка!Не удалось оформить аредну. Возможно у Вас в браузере отключены COOKIE. Или Вы не авторизованы.';
?>