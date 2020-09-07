<?php
	include('connect.php');
	echo '
	<div id="content-reserved">
		<p class="button-close">Закрыть Х</p>
		<h2>Доступный транспорт</h2>
		<div id="head-order"><span>Выберите удобный для Вас пункт выдачи:</span><select id="select-adress">';
		$adress_array = array();
		$query5 = mysqli_query($connection, 'SELECT * FROM offices');
    	while($row5 = mysqli_fetch_array($query5))
    	{
    		echo '<option data-adress-id='.$row5['id'].'>'.$row5['adress'].'</option>';
    		$adress_array[$row5['id']] = $row5['adress'];
    	}
    		echo '</select><button id="select-adress-button">Выбрать
		</div>
	</div>';
if(isset($_COOKIE['id']) && isset($_COOKIE['login']) && isset($_COOKIE['balans']) && isset($_COOKIE['reserved_transport']))
{
	$sql3 = 'SELECT * FROM transport WHERE `reserved`=0';
	$query3 = mysqli_query($connection, $sql3);
	while ($row3 = mysqli_fetch_array($query3))
	{
		echo
		'<div id="row-reserved-transport">
			<div id="image-box" style="background-image: url('.$row3['image'].')"></div>
			<div id="info-box">
				<div id="title-transport">'.$row3['title'].'. №'.$row3['id'].'</div>
				<div id="propertyes_transport">
					<p id="max-weight" class="property-transport">Максимальная нагрузка: '.$row3['max_weight'].'</p>
					<p id="max-speed" class="property-transport">Максимальная скорость: '.$row3['max_speed'].'</p>
					<p id="power-engine" class="property-transport">Мощность двигателя: '.$row3['power_engine'].'</p>
					<p id="mileage-single-charge" class="property-transport">Максимальный пробег на полном заряде: '.$row3['mileage_single_charge'].'</p>
					<p id="adress-transport" class="property-transport">Адрес стоянки транспорта: '.$adress_array[$row3['id_office']].'</p>
					<p id="color" class="property-transport">Цвет: '.$row3['color'].'</p>
					<p id="cost" class="property-transport">Цена за час использования: '.$row3['cost'].'</p>
				</div>
			</div>
			<div id="button-box">
				<div class="box">
					<span id="'.$row3['id'].'" class="rent-button button">Арендовать</span>
				</div>
				<div class="box">
					<span id="'.$row3['id'].'" class="res-button button">Забронировать</span>
				</div>
			</div>
		</div>
		<hr>';
	}
	echo '</div>';
	mysqli_free_result($query3);
	mysqli_close($connection);
}
else echo 'Чтобы добавить заказ необходимо авторизоваться.';
?>