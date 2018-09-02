<?php
	require '../view/config.php';
	require '../view/connection.php';
	$link = DBConnect();

	$idItem = $_POST['idItem'];
	$idReceptor = $_POST['idrecetor'];
	
                          
	$sql = "UPDATE `item` SET `IdReceptor` = $idReceptor, `Situacao` = 'S' WHERE IdItem = $idItem ";
	
	echo $sql;

	$result = $link->query($sql);
	
	mysqli_close($link);
?> 