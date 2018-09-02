<?php
	require '../view/config.php';
	require '../view/connection.php';
	$link = DBConnect();

	$cpf = $_POST['cpf'];

	$sql = "DELETE FROM `pessoa` WHERE CPF = $cpf ";

	$result = $link->query($sql);
	
	mysqli_close($link);
?>