<?php
	include('connect.php');
	$query5 = mysqli_query($connection, 'SELECT * FROM reserved_transport WHERE `id_transport` ='.$_POST['transport_id']);
	$row5 = mysqli_fetch_array($query5);
	$query = mysqli_query($connection, 'INSERT INTO orders(`user_id`, `transport_id`, `date_start`) VALUES('.$row5["id_user"].', '.$_POST["transport_id"].', "'.date("Y-n-j H:i").'")');
	mysqli_query($connection, 'UPDATE transport SET `in_order`=1, `reserved`=1 WHERE id='.$_POST['transport_id']);
	$query6 = mysqli_query($connection, 'DELETE FROM reserved_transport WHERE `id_transport` = '.$_POST['transport_id']);
	if ($_COOKIE['id'] == $_POST['user_id']) setcookie('active_orders', $_COOKIE['active_orders'] + 1, time() + 60 * 60 * 24 * 365, '/');
	mysqli_close($connection);
?>