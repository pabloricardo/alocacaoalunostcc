<?php
	require '../view/config.php';
	require '../view/connection.php';
	$link = DBConnect();

	$nome = $_POST['editar-nome'];
	$email = $_POST['editar-email'];
	$disciplina = $_POST['editar-disciplina'];
	$quantidade_orientacoes = $_POST['editar-quantidade_orientacoes'];
	$status = $_POST['editar-status'];
	$descricao = $_POST['editar-descricao'];
	$matricula = $_POST['editar-matricula'];

	$update = "UPDATE `professores` 
	SET nome = '$nome', email = '$email', 
	disciplina = '$disciplina', quantidade_orientacoes = $quantidade_orientacoes, status = '$status',
	descricao = '$descricao'
	WHERE matricula = $matricula";

	var_dump($update);

	$alterar = $link->query($update);
	
	var_dump($alterar);

	$sql = "SELECT * FROM `professores` WHERE matricula = $matricula";
	$result = $link->query($sql);

	$row = $result->fetch_assoc();
    echo json_encode($row);
	mysqli_close($link);
?>