<?php
	require '../view/config.php';
	require '../view/connection.php';
	$link = DBConnect();

	$idItem = $_POST['idItem'];

	$sql = "DELETE FROM `item` WHERE IdItem = $idItem ";

	$result = $link->query($sql);
	
	mysqli_close($link);
?>