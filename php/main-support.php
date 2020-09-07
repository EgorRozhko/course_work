<?php
	include('connect.php');
	$query = mysqli_query($connection, "INSERT INTO support(`theme`, `message`, `contact`) VALUES('".$_POST['theme']."', '".$_POST['message']."', '".$_POST['contact']."')");
	if($query) echo 'Ваше сообщение было доставлено. С Вами скоро свяжутся.';
	else echo 'Произошла ошибка при отправке сообщения';
	mysqli_close($connection);
?>