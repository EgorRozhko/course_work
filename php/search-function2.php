<?php
	echo '<hr id="user-border">';
	include('connect.php');
	$sql = 'SELECT * FROM accounts WHERE (`email` LIKE "%'.$_POST['login'].'%" OR `phone` LIKE "%'.$_POST['login'].'%") AND `admin` =0';
	$query = mysqli_query($connection, $sql);
	if(mysqli_num_rows($query) > 0)
	{
		while ($row = mysqli_fetch_array($query))
		{
			echo '
				<div id="user-list">
					<div id="user-propertyes">
						<p class="property-user" id="user-name">ФИО: '.$row['name'].' '.$row['surname'].' '.$row['patronomyc'].'</p>
						<p class="property-user" id="user-id">Номер аккаунта: '.$row['ID'].'</p>
						<p class="property-user" id="user-mail">E-mail: '.$row['email'].'</p>
						<p class="property-user" id="user-phone">Номер телефона: '.$row['phone'].'</p>';
						if ($row['activation'] == 0) echo '<p class="property-user" id="user-status">Статус: не активирован</p>';
						else echo '<p class="property-user" id="user-status">Статус: активирован</p>';
						echo '<p class="property-user" id="user-balans">Баланс: '.$row['balans'].'руб.</p>
					</div>
					<p id='.$row['ID'].' class="create-res">Выбрать</p>
				</div>
			<hr id="user-border">';
		}
	}
	else echo 'Не найдено совпадений';
?>