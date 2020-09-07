<?php
	if ($_POST['old_phone'] == $_COOKIE['phone'])
	{
		setcookie('phone', $_POST['new_phone'], time() + 60 * 60 * 24 * 365, '/');
		echo 'Номер телефона был успешно изменён. Новый номер: '.$_POST['new_phone'];
	}
	else echo 'Вы ввели не действующий номер телефона. Повтрите ввод.';
?>