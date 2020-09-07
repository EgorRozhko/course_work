<?php
	echo '
	<title>Добавление транспорта</title>
	<link rel="stylesheet" href="css/add-transport.css" />
	<script type="text/javascript" src="js/add-transport-function.js"></script>
		<div id="add-transport-window">
			<h2>Добавление нового транспорта</h2>
			<div id="add-tranport-contant">
				<div class="add-transport-field">
					<label>Выберите тип транспорта:</label>
					<select id="transport-type">
						<option data-transport-type="Электровелосипед">Электровелосипед</option>
						<option data-transport-type="Электросамокат">Электросамокат</option>
						<option data-transport-type="Гироскутер">Гироскутер</option>
						<option data-transport-type="Гироколесо">Гироколесо</option>
					</select>
				</div>
				<p id="property-transport">Характеристики транспорта</p>
				<div class="add-transport-fields">
					<label>Максимальная грузоподъёмность:</label><input class="field" id="max-weight" type="number" />
					<label>Максимальная скорость:</label><input class="field" id="max-speed" type="number">
					<label>Мощность двигателя:</label><input class="field" id="power-engine" type="number">
					<label>Максимальный пробег на одном заряде:</label><input class="field" id="mileage-single-charge" type="number">
					<label>Цвет:</label><input class="field" id="color" type="text">
					<label>Цена за час использования: </label><input class="field" id="cost" type="number">
				</div>
				<p id="button-box"><span id="add-transport-button">Добавить</span></p>
				<p id="warning"></p>
			</div>
		</div>
';
?>