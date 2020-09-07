<?php
	include('connect.php');
	$delete_reserved_transport = 'DELETE FROM reserved_transport WHERE id_transport='.$_POST['id_transport'];
	$update_transport = 'UPDATE transport SET `reserved`=0 WHERE id='.$_POST['id_transport'];
	mysqli_query($connection, $delete_reserved_transport);
	mysqli_query($connection, $update_transport);
	setcookie('reserved_transport', $_COOKIE['reserved_transport']-1, time()+60*60*24*365, '/');
	mysqli_close($connection);
?>