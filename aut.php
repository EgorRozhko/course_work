<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Авторизация</title>
	<link rel="stylesheet" type="text/css" href="css/style_autorisation_form.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/autorisation.js"></script>
</head>
<body>
<?php
if(!isset($_COOKIE['id']))
echo '<div id="reg-block">
		<h3>Авторизация</h3>
		<div id="form" class="formWithValidation">
			<label for="email">E-mail:</label><input type="email" class="field" maxlength="100" name="email" id="email" />
			<label for="password">Пароль:</label><input type="password" class="field" name="password" maxlength="50" id="password" />
		</div>
		<h4><span>Войти</span></h4>
		<div id="warning"></div>
	</div>
	<div id="image-block">
		<div id="front-plan"></div>
	</div>';
else echo 'Вы уже авторизованы';
?>
</body>
</html>
