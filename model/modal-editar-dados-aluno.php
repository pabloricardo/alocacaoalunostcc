<?php
	require 'config.php';
	require 'connection.php';
	$link = DBConnect();

	$matricula = $_POST['matricula'];

	$sql = "SELECT * FROM `alunos` WHERE matricula = $matricula";



	$result = $link->query($sql);

	$row = $result->fetch_assoc();
    echo json_encode($row);
	mysqli_close($link);
?>