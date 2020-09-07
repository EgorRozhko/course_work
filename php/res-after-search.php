<?php
	include('connect.php');
	$query3 = mysqli_query($connection, 'SELECT * FROM orders WHERE `user_id`= '.$_POST['user_id']. ' AND `finish` = 0');
	$query4 = mysqli_query($connection, 'SELECT * FROM reserved_transport WHERE `id_user`= '.$_POST['user_id']);
	if (mysqli_num_rows($query3) + mysqli_num_rows($query4) >= 3) echo '!';
	else {
$sql = 'INSERT INTO reserved_transport(`id_user`, `id_transport`) VALUES('.$_POST["user_id"].', '.$_POST["transport_id"].')';
		$query = mysqli_query($connection, $sql);
		$query2 = mysqli_query($connection, 'UPDATE transport SET `reserved`=1 WHERE id='.$_POST['transport_id']);
		if ($_COOKIE['id'] == $_POST['user_id']) setcookie('active_orders', $_COOKIE['active_orders'] + 1, time() + 60 * 60 * 24 * 365, '/');
	}
	mysqli_free_result($query3);
	mysqli_free_result($query4);
	mysqli_close($connection);
?>