<?php
	require '../view/config.php';
	require '../view/connection.php';
	$link = DBConnect();

	$matriculaAntiga = $_POST['matricula-antiga'];
	$novaMatricula = $_POST['matricula-nova'];
	$nome = $_POST['editar-nome'];
	$email = $_POST['editar-email'];
	$disciplina = $_POST['editar-disciplina'];
	$quantidade_orientacoes = $_POST['editar-quantidade_orientacoes'];
	$status = $_POST['editar-status'];

//$sql="UPDATE {$tbl_name} SET state='{$state}', zip='{$zip}' WHERE custnum='{$custnum}'" $novoCpf = $_POST['editar-cpf']; CPF = '{$novoCpf}';

	$update = "UPDATE `professores` 
	SET matricula = $novaMatricula, nome = '$nome', email = '$email', 
	disciplina = '$disciplina', quantidade_orientacoes = $quantidade_orientacoes, status = '$status'
	WHERE matricula = $matriculaAntiga";
	$alterar = $link->query($update);


	$sql = "SELECT * FROM `professores` WHERE matricula = $novaMatricula";
	$result = $link->query($sql);

	$row = $result->fetch_assoc();
    echo json_encode($row);
	mysqli_close($link);
?>