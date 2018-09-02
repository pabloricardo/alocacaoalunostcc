<?php
	require '../view/config.php';
	require '../view/connection.php';
	$link = DBConnect();

	$cpf = $_POST['cpf'];

	$sql = "SELECT * FROM `pessoa` WHERE CPF = $cpf ";



	$result = $link->query($sql);

	$row = $result->fetch_assoc();
    echo json_encode($row);
	mysqli_close($link);
?>