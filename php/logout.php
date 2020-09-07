<?php
	include('connect.php');
	mysqli_query($connection, 'UPDATE accounts SET `balans`='.$_COOKIE['balans']. ', `phone`='.$_COOKIE['phone'].', `password`="'.$_COOKIE['password'].'", `admin`='.$_COOKIE['admin'].' WHERE `id`='.$_COOKIE['id']);
	mysqli_close($connection);
	setcookie('login', $_POST['email'], time()-60*60*24*365, '/');
	setcookie('id', $row['ID'], time()-60*60*24*365, '/');
	setcookie('balans', $row['balans'], time()-60*60*24*365, '/');
	setcookie('reserved_transport', mysqli_num_rows($query1), time()-60*60*24*365, '/');
	setcookie('active_orders', mysqli_num_rows($query2), time()-60*60*24*365, '/');
	setcookie('phone', $row['phone'], time() - 60 * 60 * 24 * 365, '/');
	setcookie('password', $row['password'], time() - 60 * 60 * 24 * 365, '/');
	setcookie('admin', $row['admin'], time() - 60 * 60 * 24 * 365, '/');
	echo "true";
?>