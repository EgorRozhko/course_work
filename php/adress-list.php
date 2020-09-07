<?php
	include('connect.php');
	$sql = 'SELECT * FROM offices';
	$query = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_array($query)) echo '<option data-adress-id='.$row['id'].'>'.$row['adress'].'</option>';
?>