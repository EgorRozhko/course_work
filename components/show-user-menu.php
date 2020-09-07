	<?php
	include('../php/connect.php');
	$sql = 'SELECT * FROM accounts WHERE email="'.$_COOKIE['login'].'"';
	$query = mysqli_query($connection, $sql);
	$row = mysqli_fetch_array($query);
	$query1 = mysqli_query($connection, 'SELECT * FROM support WHERE `contact`="'.$row['email'].'" AND `user_check`=0');
	$row1 = mysqli_fetch_array($query1);
	echo'
		<p id="menu-user-name">'.$row['name'].' '.$row['surname'].' '.$row['patronomyc'].'</p>
		<p id="menu-user-id">Номер пользователя: '.$row['ID'].'</p><hr>
		<p class="user-menu-item" id="active-orders-button">Активные заказы('.$_COOKIE['active_orders'].')</p>
		<p class="user-menu-item" id="active-reserved-transport-button">Зарезервированный транспорт('.$_COOKIE['reserved_transport'].')</p>
		<p class="user-menu-item" id="history-orders">История заказов</p>
		<p class="user-menu-item" id="settings">Настройки</p>
		<p class="user-menu-item" id="support-system">Служба поддержки('.mysqli_num_rows($query1).')</p><hr>';
		if ($_COOKIE['admin'] != 0)	echo '<p class="user-menu-item" id="apanel">Админ панель</p><hr/>';
		echo '
		<div id="balans-block">
			<div>
				<img src="../images/icons/coin.svg">
				<p class="user-menu-item balans">Баланс: '.$_COOKIE['balans'].' руб.</p>
				<p class="user-menu-item balans donate">Пополнить </p>
			</div>
		<hr>
		<p class="user-menu-item" id="logout">Выйти</p>';
	mysqli_free_result($query);
	mysqli_close($connection);
?>