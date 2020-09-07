<?php
	if ($_POST['current_password'] != $_COOKIE['password'])
	{
		echo "e01!Вы ввели не верный старый пароль.";
	}
	else
	{
		if ($_POST['new_password'] != $_POST['new_password_confirm'])
		{
			echo "e02!Введённые Вами новые пароли не совпадают";
		}
		else
		{
			setcookie('password', $_POST['new_password'], time() + 60 * 60 * 24 * 365, '/');
			echo 'e00!Ваш пароль был успешно изменён. Новый пароль: '.$_POST['new-password'];
		}
	}
?>