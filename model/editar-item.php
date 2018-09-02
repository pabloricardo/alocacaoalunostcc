<?php
	require '../view/config.php';
	require '../view/connection.php';
	$link = DBConnect();

	$idItem = $_POST['idItem'];

	$sql = "SELECT * FROM `item` WHERE IdItem = $idItem ";



	$result = $link->query($sql);

	$row = $result->fetch_assoc();
    echo json_encode($row);
	mysqli_close($link);
?>