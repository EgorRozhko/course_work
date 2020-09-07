<?php
	include('connect.php');
	echo '<link rel="stylesheet" href="css/search.css">
	<script type="text/javascript" src="js/search-button.js"></script>
	<title>Поиск</title>';
	if($_GET['type'] == 'rent')
	{
		$query = mysqli_query($connection, 'SELECT * FROM transport WHERE id='.$_GET['transport-id'].' AND `reserved`=0');
		$row = mysqli_fetch_array($query);
		if(mysqli_num_rows($query) == 0) echo "<p id='warning'>Данный транспорт занят.</p>";
		else
		{
			echo '
			<h1>Выбранный транспорт</h1>
			<hr />
			<div id="row-reserved-transport">
				<div id="image-box" style="background-image: url('.$row['image'].')"></div>
				<div id="info-box">
					<div class="title-transport" id='.$row['id'].'>'.$row['title'].'. №'.$row['id'].'</div>
					<div id="propertyes_transport">
						<p id="max-weight" class="property-transport-search">Максимальная нагрузка: '.$row['max_weight'].'</p>
						<p id="max-speed" class="property-transport-search">Максимальная скорость: '.$row['max_speed'].'</p>
						<p id="power-engine" class="property-transport-search">Мощность двигателя: '.$row['power_engine'].'</p>
						<p id="mileage-single-charge" class="property-transport-search">Максимальный пробег на полном заряде: '.$row['mileage_single_charge'].'</p>
						<p id="color" class="property-transport-search">Цвет: '.$row['color'].'</p>
						<p id="cost" class="property-transport-search">Цена за час использования: '.$row['cost'].' руб.</p>
					</div>
				</div>
			</div>
			<h2>Поиск пользователя</h2>
			<div id="search-box">
				<label>E-mail или номер телефона:</label><input type="text" name="user" id="user">
				<p id="admin-rent-button-box"><span id="admin-rent-button">Поиск</span></p>
			</div>';
		}
	}
	else
	{
		$query = mysqli_query($connection, 'SELECT * FROM transport WHERE id='.$_GET['transport-id'].' AND `reserved`=0');
		$row = mysqli_fetch_array($query);
		if(mysqli_num_rows($query) == 0) echo "<p id='warning'>Данный транспорт занят.</p>";
		else
		{
			echo '
			<h1>Выбранный транспорт</h1>
			<hr />
			<div id="row-reserved-transport">
				<div id="image-box" style="background-image: url('.$row['image'].')"></div>
				<div id="info-box">
					<div class="title-transport" id='.$row['id'].'>'.$row['title'].'. №'.$row['id'].'</div>
					<div id="propertyes_transport">
						<p id="max-weight" class="property-transport-search">Максимальная нагрузка: '.$row['max_weight'].'</p>
						<p id="max-speed" class="property-transport-search">Максимальная скорость: '.$row['max_speed'].'</p>
						<p id="power-engine" class="property-transport-search">Мощность двигателя: '.$row['power_engine'].'</p>
						<p id="mileage-single-charge" class="property-transport-search">Максимальный пробег на полном заряде: '.$row['mileage_single_charge'].'</p>
						<p id="color" class="property-transport-search">Цвет: '.$row['color'].'</p>
						<p id="cost" class="property-transport-search">Цена за час использования: '.$row['cost'].' руб.</p>
					</div>
				</div>
			</div>
			<h2>Поиск пользователя</h2>
			<div id="search-box">
				<label>E-mail или номер телефона:</label><input type="text" name="user" id="user">
				<p id="admin-rent-button-box"><span id="admin-res-button">Поиск</span></p>
			</div>';
		}
	}
	echo '<div id="findly-user"></div>';
?>