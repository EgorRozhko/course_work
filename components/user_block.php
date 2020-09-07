<?php
	if(isset($_COOKIE['login']))
	{
		include('php/connect.php');
		$sql = 'SELECT * FROM accounts WHERE email="'.$_COOKIE['login'].'"';
		$query = mysqli_query($connection, $sql);
		$row = mysqli_fetch_array($query);
		echo '<p class="user_name">'.$row['name'].' '.$row['surname'].' '.$row['patronomyc'].'</p><p id="triangle">&#9660</p>';
		mysqli_free_result($query);
		mysqli_close($connection);
	}
	else { echo '<a class="enter-button" href="aut.php">Войти</a> <a class="enter-button" href="reg.php">Регистрация</a>'; }
?>