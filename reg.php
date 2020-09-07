<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Регистрация</title>
	<link rel="stylesheet" type="text/css" href="css/style_register_form.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/registration.js"></script>
</head>
<body>
	<?php
		if(!isset($_COOKIE['id']))
		{
			echo '
			<div id="popup">
				На указанный Вами e-mail адрес будет выслано письмо с указаниями для активации аккаунта
			</div>
			<div id="reg-block">
				<h3>Регистрация</h3>
				<div id="form" class="formWithValidation">
					<label for="name">Имя:</label><input type="text" maxlength="50" class="field" name="name" id="name" />
					<label for="surname">Фамилия:</label><input type="text" maxlength="50" class="field" name="surname" id="surname" />
					<label for="patronomyc">Отчество:</label><input type="text" maxlength="50" class="field" name="patronomyc" id="patronomyc" />
					<label for="email">E-mail:</label><input type="email" class="field" maxlength="100" name="email" id="email" />
					<label for="phone">Номер телефона:</label><input type="text" class="field" maxlength="13" name="phone" id="phone" />
					<label for="password">Пароль:</label><input type="password" class="field" name="password" maxlength="50" id="password" />
					<label for="confirm-password">Повторите пароль:</label><input class="field" type="password" maxlength="50" name="confirm-password" id="confirm-password" />
				</div>
				<h4><a href="#">Зарегистрироваться</a></h4>
				<div id="warning"></div>
			</div>
			<div id="image-block">
				<div id="front-plan"></div>
			</div>';
		}
		else echo 'Вы уже авторизованы';
	?>
</body>
</html>
