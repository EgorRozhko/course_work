<?php
	include('connect.php');
	$query = mysqli_query($connection, 'SELECT * FROM transport WHERE `reserved` = 0 AND `id_office` = '.$_COOKIE['office_id']);
	echo 	'<div id="block">
			<title>Списание транспорта</title>
			<link rel="stylesheet" href="css/remove-transport.css">
			<script type="text/javascript" src="js/search-button.js"></script>
			<h1>Транспорт в наличии</h1>
			<hr />';
	if (mysqli_num_rows($query) == 0) echo 'Свободного транспорта нет';
	else
	{
		while ($row = mysqli_fetch_array($query))
		{
			echo '
				<div id="row-reserved-transport">
					<div id="image-box" style="background-image: url('.$row['image'].')"></div>
					<div id="info-box">
						<div class="title-transport" id='.$row['id'].'>'.$row['title'].'. №'.$row['id'].'</div>
						<div id="propertyes_transport">
							<p id="max-weight" class="property-transport">Максимальная нагрузка: '.$row['max_weight'].'</p>
							<p id="max-speed" class="property-transport">Максимальная скорость: '.$row['max_speed'].'</p>
							<p id="power-engine" class="property-transport">Мощность двигателя: '.$row['power_engine'].'</p>
							<p id="mileage-single-charge" class="property-transport">Максимальный пробег на полном заряде: '.$row['mileage_single_charge'].'</p>
							<p id="color" class="property-transport">Цвет: '.$row['color'].'</p>
							<p id="cost" class="property-transport">Цена за час использования: '.$row['cost'].' руб.</p>
						</div>
					</div>
					<div id="remove-transport-button-box">
						<p id='.$row['id'].' class="remove-transport-button">Списать транспорт</p>
					</div>
				</div>
			';
		}
	}
	echo '</div>';
		mysqli_free_result($query);
		mysqli_close($connection);
?>