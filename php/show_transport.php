<?php
	include('connect.php');
	$sql2 = 'SELECT * FROM transport WHERE `reserved`=0 AND `id_office`='.$_POST['select_adress'];
	$query2 = mysqli_query($connection, $sql2);
	echo '
	<div id="content-reserved">
		<p class="button-close">Закрыть Х</p>
		<h2>Доступный транспорт</h2>
		<div id="head-order"><select id="select-adress">';
		include('adress-list.php'); echo '</select><button id="select-adress-button">Выбрать
		</div>
	</div>';
	while ($row2 = mysqli_fetch_array($query2))
	{
		echo
		'<div id="row-reserved-transport">
			<div id="image-box" style="background-image: url('.$row2['image'].')"></div>
			<div id="info-box">
				<div id="title-transport">'.$row2['title'].'. №'.$row2['id'].'</div>
				<div id="propertyes_transport">
					<p id="max-weight" class="property-transport">Максимальная нагрузка: '.$row2['max_weight'].'</p>
					<p id="max-speed" class="property-transport">Максимальная скорость: '.$row2['max_speed'].'</p>
					<p id="power-engine" class="property-transport">Мощность двигателя: '.$row2['power_engine'].'</p>
					<p id="mileage-single-charge" class="property-transport">Максимальный пробег на полном заряде: '.$row2['mileage_single_charge'].'</p>
					<p id="color" class="property-transport">Цвет: '.$row2['color'].'</p>
				</div>
			</div>
			<div id="button-box">
				<div class="box">
					<span id="'.$row2['id'].'" class="rent-button button">Арендовать</span>
				</div>
				<div class="box">
					<span id="'.$row2['id'].'" class="res-button button">Забронировать</span>
				</div>
			</div>
		</div>
		<hr>';
	}
	echo '</div>';
	mysqli_free_result($query2);
	mysqli_close($connection);
?>