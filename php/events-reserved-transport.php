<?php
	if(isset($_COOKIE['id']) && isset($_COOKIE['login']) && isset($_COOKIE['balans']) && isset($_COOKIE['reserved_transport']))
	{
		include('connect.php');
		$sql = 'INSERT INTO orders(`user_id`, `transport_id`, `date_start`) VALUES('.$_COOKIE["id"].', '.$_POST["id_transport"].', "'.date("Y-n-j-H-i").'")';
		$query = mysqli_query($connection, $sql);
		$query2 = mysqli_query($connection, 'UPDATE transport SET `reserved`=1 WHERE id='.$_POST['id_transport']);
		echo 'true';
	}
	else echo 'Не удалось оформить аредну. Возможно у Вас в браузере отключены COOKIE.';
?>