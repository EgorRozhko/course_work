<?php
if(isset($_COOKIE['id']) && isset($_COOKIE['login']) && isset($_COOKIE['balans']) && isset($_COOKIE['reserved_transport']))
{
	include('connect.php');
	$sql = 'SELECT * FROM transport INNER JOIN reserved_transport ON reserved_transport.id_transport = transport.id WHERE reserved_transport.id_user='.$_COOKIE['id'];
	$sql1 = 'SELECT * FROM transport INNER JOIN orders ON orders.transport_id = transport.id WHERE orders.finish = 0 AND orders.user_id='.$_COOKIE['id'];
	$query = mysqli_query($connection, $sql);
	$query1 = mysqli_query($connection, $sql1);
	echo '<h3 class="rented-transport">Арендованный транспорт</h3>';
	if (mysqli_num_rows($query1) == 0) echo "<p class='no-rent-transport'>В данный момент у Вас нет арендованного транспорта</p>";
	else
	{
		while($row1 = mysqli_fetch_array($query1))
		{
			echo '
			<div id="row">
			<div id="image-box" style="background-image:url('.$row1['image'].')"></div>
			<div id="info-box">
					<div id="title-transport">'.$row1['title'].'. №'.$row1['transport_id'].'</div>
					<div id="propertyes_transport">
						<p id="max-weight" class="property-transport">Максимальная нагрузка: '.$row1['max_weight'].'</p>
						<p id="max-speed" class="property-transport">Максимальная скорость: '.$row1['max_speed'].'</p>
						<p id="power-engine" class="property-transport">Мощность двигателя: '.$row1['power_engine'].'</p>
						<p id="mileage-single-charge" class="property-transport">Максимальный пробег на полном заряде: '.$row1['mileage_single_charge'].'</p>
						<p id="color" class="property-transport">Цвет: '.$row1['color'].'</p>
					</div>
			</div>
			<div id="button-box">
				<div class="box"><span class="button1 cancel_rent" id="'.$row1['transport_id'].'">Завершить аренду</span></div>
			</div>
		</div>';
		}
	}
	echo '<h3>Забронированный транспорт</h3>';
	if (mysqli_num_rows($query) == 0) echo "<p class='no-reserved-transport'>В данный момент у Вас нет забронированного транспорта</p>";
	else
	{
		while($row = mysqli_fetch_array($query))
		{
			echo '
			<div id="row">
			<div id="image-box" style="background-image:url('.$row['image'].')"></div>
			<div id="info-box">
					<div id="title-transport">'.$row['title'].'. №'.$row['id'].'</div>
					<div id="propertyes_transport">
						<p id="max-weight" class="property-transport">Максимальная нагрузка: '.$row['max_weight'].'</p>
						<p id="max-speed" class="property-transport">Максимальная скорость: '.$row['max_speed'].'</p>
						<p id="power-engine" class="property-transport">Мощность двигателя: '.$row['power_engine'].'</p>
						<p id="mileage-single-charge" class="property-transport">Максимальный пробег на полном заряде: '.$row['mileage_single_charge'].'</p>
						<p id="color" class="property-transport">Цвет: '.$row['color'].'</p>
					</div>
			</div>
			<div id="button-box">
				<div class="box">
					<span class="first-button button1" id='.$row['id_transport'].'>Оформить заказ</span>
				</div>
				<div class="box">
					<span class="second-button button1" id='.$row['id_transport'].'>Снять бронь</span>
				</div>
			</div>
		</div>';
		}
	}
	mysqli_free_result($query);
	mysqli_close($connection);
}
else echo 'Чтобы посмотреть активные заказы необходимо авторизоваться.';
?>