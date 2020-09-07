<?php
	include('connect.php');
	mysqli_query($connection, 'UPDATE transport SET `reserved` = 0 WHERE `id` = '.$_POST['transport_id']);
	mysqli_query($connection, 'DELETE FROM reserved_transport WHERE `id_transport` ='.$_POST['transport_id']);
	$query1 = mysqli_query($connection, 'SELECT * FROM transport WHERE `in_order`=0 AND `reserved` = 1 AND `id_office` = '.$_COOKIE['office_id']);
	echo 	'
			<title>Списание транспорта</title>
			<script type="text/javascript" src="js/search-button.js"></script>
			<h1>Транспорт в наличии</h1>
			<hr />';
	if (mysqli_num_rows($query1) == 0) echo 'Забронированного транспорта нет';
	else
	{
		while ($row1 = mysqli_fetch_array($query1))
		{
			echo '
				<div id="row-reserved-transport">
					<div id="image-box" style="background-image: url('.$row1['image'].')"></div>
					<div id="info-box">
						<div class="title-transport" id='.$row1['id'].'>'.$row1['title'].'. №'.$row1['id'].'</div>
						<div id="propertyes_transport">
							<p id="max-weight" class="property-transport">Максимальная нагрузка: '.$row1['max_weight'].'</p>
							<p id="max-speed" class="property-transport">Максимальная скорость: '.$row1['max_speed'].'</p>
							<p id="power-engine" class="property-transport">Мощность двигателя: '.$row1['power_engine'].'</p>
							<p id="mileage-single-charge" class="property-transport">Максимальный пробег на полном заряде: '.$row1['mileage_single_charge'].'</p>
							<p id="color" class="property-transport">Цвет: '.$row1['color'].'</p>
							<p id="cost" class="property-transport">Цена за час использования: '.$row1['cost'].' руб.</p>
						</div>
					</div>
					<p id='.$row1['id'].' class="cancel-admin-reserved">Снять бронь</p>
					<p id='.$row1['id'].' class="create-admin-rent">Оформить аренду</p>
				</div>
			';
		}
	}
?>