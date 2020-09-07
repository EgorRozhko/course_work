<?php
	$answer = stripslashes($_POST['answer_text']);
	$answer = trim($answer);
	include('connect.php');
	$query = mysqli_query($connection, 'SELECT * FROM accounts WHERE `ID`='.$_COOKIE['id']);
	$row = mysqli_fetch_array($query);
	mysqli_query($connection, 'UPDATE support SET `answer`="'.$answer.'.<br> Ответил сотрудник службы поддержки: '.$row['surname'].' '.$row['name'].' '.$row['patronomyc'].'." WHERE `id`='.$_POST['id_question']);
	mysqli_close($connection);
?>