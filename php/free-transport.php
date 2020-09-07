<?php
	echo '<link rel="stylesheet" href="css/free-transport.css">
	<script type="text/javascript" src="js/free-transport.js"></script>
	<title>Свободный транспорт</title>';
	include('connect.php');
	$sql3 = 'SELECT * FROM transport WHERE `reserved`=0 AND `id_office`= '.$_COOKIE['office_id'];
	$query3 = mysqli_query($connection, $sql3);
	while ($row3 = mysqli_fetch_array($query3))
	{
		echo
		'
		<div id="row-reserved-transport">
			<div id="image-box" style="background-image: url('.$row3['image'].')"></div>
			<div id="info-box">
				<div id="title-transport">'.$row3['title'].'. №'.$row3['id'].'</div>
				<div id="propertyes_transport">
					<p id="max-weight" class="property-transport">Максимальная нагрузка: '.$row3['max_weight'].'</p>
					<p id="max-speed" class="property-transport">Максимальная скорость: '.$row3['max_speed'].'</p>
					<p id="power-engine" class="property-transport">Мощность двигателя: '.$row3['power_engine'].'</p>
					<p id="mileage-single-charge" class="property-transport">Максимальный пробег на полном заряде: '.$row3['mileage_single_charge'].'</p>
					<p id="color" class="property-transport">Цвет: '.$row3['color'].'</p>
					<p id="cost" class="property-transport">Цена за час использования: '.$row3['cost'].'</p>
				</div>
			</div>
			<div id="button-box">
				<div class="box">
					<span id="'.$row3['id'].'" class="admin-rent-button button">Оформить аренду</span>
				</div>
				<div class="box">
					<span id="'.$row3['id'].'" class="admin-res-button button">Оформить бронь</span>
				</div>
			</div>
		</div>
		<hr>';
	}
	echo '</div>';
	mysqli_free_result($query3);
	mysqli_close($connection);
?>