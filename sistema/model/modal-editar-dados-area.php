<?php
	require 'config.php';
	require 'connection.php';
	$link = DBConnect();

	$id_area = $_POST['id_area'];

	$sql = "SELECT * FROM `area` WHERE id_area = $id_area ";



	$result = $link->query($sql);

	$row = $result->fetch_assoc();
    echo json_encode($row);
	mysqli_close($link);
?>