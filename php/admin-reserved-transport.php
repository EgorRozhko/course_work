<?php
	include('connect.php');
	$query = mysqli_query($connection, 'SELECT * FROM transport WHERE `in_order`=0 AND `reserved` = 1 AND `id_office` = '.$_COOKIE['office_id']);
	echo 	'<div id="block">
			<link rel="stylesheet" href="css/admin-reserved-transport.css" />
			<title>Забронированный транспорта</title>
			<script type="text/javascript" src="js/search-button.js"></script>
			<h1>Транспорт в наличии</h1>
			<hr />
			<div id="block">';
	if (mysqli_num_rows($query) == 0) echo 'Забронированного транспорта нет';
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
					<div id="button-box">
						<div class="first-box">
							<p id='.$row['id'].' class="cancel-admin-reserved"><span class="abutton">Снять бронь</span></p>
						</div>
						<div class="second-box">
							<p id='.$row['id'].' class="create-admin-rent"><span class="abutton">Оформить аренду</span></p>
						</div>
					</div>
				</div>
			';
		}
	}
	echo '</div>';
?>