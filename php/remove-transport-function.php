<?php
	include('connect.php');
	$query1 = mysqli_query($connection,'DELETE FROM transport WHERE `id` = '.$_POST['transport_id']);
	$query2 = mysqli_query($connection, 'SELECT * FROM transport WHERE `reserved` = 0 AND `id_office` = '.$_COOKIE['office_id']);
	$row2 = mysqli_fetch_array($query2);
	echo 	'<div id="block">
			<title>Списание транспорта</title>
			<script type="text/javascript" src="js/search-button.js"></script>
			<h1>Транспорт в наличии</h1>
			<hr />';
	if (mysqli_num_rows($query2) == 0) echo 'Свободного транспорта нет';
	else
	{
		echo '
			<div id="row-reserved-transport">
				<div id="image-box" style="background-image: url('.$row2['image'].')"></div>
				<div id="info-box">
					<div class="title-transport" id='.$row2['id'].'>'.$row2['title'].'. №'.$row2['id'].'</div>
					<div id="propertyes_transport">
						<p id="max-weight" class="property-transport">Максимальная нагрузка: '.$row2['max_weight'].'</p>
						<p id="max-speed" class="property-transport">Максимальная скорость: '.$row2['max_speed'].'</p>
						<p id="power-engine" class="property-transport">Мощность двигателя: '.$row2['power_engine'].'</p>
						<p id="mileage-single-charge" class="property-transport">Максимальный пробег на полном заряде: '.$row2['mileage_single_charge'].'</p>
						<p id="color" class="property-transport">Цвет: '.$row2['color'].'</p>
						<p id="cost" class="property-transport">Цена за час использования: '.$row2['cost'].' руб.</p>
					</div>
				</div>
				<p id='.$row2['id'].' class="remove-tranport-button">Списать транспорт</p>';
	}
	echo '</div>';
	mysqli_free_result($query2);
	mysqli_close($connection);
?>