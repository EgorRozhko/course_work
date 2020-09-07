<?php
	$server = 'localhost';
	$database = 'eltransport';
	$user = 'root';
	$password = '';
	$connection = mysqli_connect($server, $user, $password, $database) or die ('Не удалось поключиться к базе данных');
?>