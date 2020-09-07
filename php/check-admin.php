<?php
	if ($_COOKIE['admin'] == 0) echo '<p>Вы не администратор.</p>';
	else
	{
		include('connect.php');
		$query = mysqli_query($connection, 'SELECT `adress` FROM offices WHERE `id`='.$_COOKIE['office_id']);
		$row = mysqli_fetch_array($query);
		$query1 = mysqli_query($connection, 'SELECT * FROM support WHERE `answer` IS NULL');
		echo'
		<div id="item-box">
			<p id="adress">Ваш пункт выдачи: '.$row['adress'].'</p>
			<script type="text/javascript" src="js/admin-buttons.js"></script>
			<p id="add-transport" class="admin-item"><span>+ Добавить транспорт</span></p>
			<p id="free-transport" class="admin-item"><span>Свободный транпорт</span></p>
			<p id="delete-transport" class="admin-item"><span>Списать транспорт</span></p>
			<p id="admin-reserved-transport" class="admin-item"><span>Зарезервированный транспорт</span></p>
			<p id="order-button" class="admin-item"><span>Арендованный транспорт</span></p>
			<p id="feedback-button" class="admin-item"><span>Новые обращения('.mysqli_num_rows($query1).')</span></p>
		</div>';
		mysqli_free_result($query);
		mysqli_free_result($query1);
		mysqli_close($connection);
	}
?>