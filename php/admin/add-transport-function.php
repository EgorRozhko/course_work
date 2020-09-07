<?php
	if (!isset($_COOKIE['office_id']))	echo 'У Вас нет полномочий добавлять транспорт';
	else
	{
		 $sql = 'INSERT INTO transport(`title`, `id_office`, `max_weight`, `max_speed`, `power_engine`, `mileage_single_charge`, `color`, `cost`) VALUES("'.$_POST['transport_type'].'", '.$_COOKIE['office_id'].', '.$_POST['max_weight'].', '.$_POST['max_speed'].', '.$_POST['power_engine'].', '.$_POST['mileage_single_charge'].', "'.$_POST['color'].'", '.$_POST['cost'].')';
		include('../connect.php');
		mysqli_query($connection, $sql);
		mysqli_close($connection);
		echo 'Новый транспорт успешно добавлен';
	}
?>