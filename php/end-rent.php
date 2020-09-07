<?php
	include('connect.php');
	$sql1 = 'SELECT `cost` FROM transport WHERE `id`= '.$_POST['transport_id'];
	$query1 = mysqli_query($connection, $sql1);
	$row1 = mysqli_fetch_array($query1);
	$d1 = date("Y-n-j H:i");
	$d2 = $_POST['date_start'];
	$d1_ts = strtotime($d1);
	$d2_ts = strtotime($d2);
	$seconds = abs($d1_ts - $d2_ts);
	$hours = floor($seconds / 3600);
	$total = $hours * $row1['cost'];

	if($_COOKIE['id'] == $_POST['user_id'])
	{
		setcookie('balans', $_COOKIE['balans'] - $total, time() + 60 * 60 * 24 * 365, '/');
		setcookie('active_orders', $_COOKIE['active_orders'] - 1, time() + 60 * 60 * 24 * 365, '/');
		if ($_COOKIE['balans'] <= 0) mysqli_query($connection, 'DELETE FROM reserved_transport WHERE `id_user`='.$_COOKIE['id']);
	}
	else
	{
		$total1 = $_POST['balans'] - $total;
		mysqli_query($connection, "UPDATE accounts SET `balans`=$total1 WHERE `ID`= $_POST[user_id]");
		if($total1 <= 0) mysqli_query($connection, 'DELETE FROM reserved_transport WHERE `id_user`='.$_POST['user_id']);
	}
	mysqli_query($connection, 'UPDATE transport SET `in_order`= 0, `reserved` = 0 WHERE `id`='.$_POST['transport_id']);
	mysqli_query($connection, 'UPDATE orders SET `date_finish`="'.$d1.'", `cost`='.$total.', `finish`=1 WHERE `transport_id`='.$_POST['transport_id']);
	echo "Стоимость услуги: $total";
	mysqli_free_result($query1);
	mysqli_close($connection);
?>