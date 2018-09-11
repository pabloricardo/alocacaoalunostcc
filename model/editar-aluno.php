<?php
	require '../view/config.php';
	require '../view/connection.php';
	$link = DBConnect();

	$matriculaAntiga = $_POST['matricula-antiga'];
	$novaMatricula = $_POST['matricula-nova'];
	$nome = $_POST['editar-nome'];
	$email = $_POST['editar-email'];

//$sql="UPDATE {$tbl_name} SET state='{$state}', zip='{$zip}' WHERE custnum='{$custnum}'" $novoCpf = $_POST['editar-cpf']; CPF = '{$novoCpf}';

	$update = "UPDATE `alunos` 
	SET matricula = $novaMatricula, nome = '$nome', email = '$email'
	WHERE matricula = $matriculaAntiga";
	$link->query($update);

	$updateAlunoComoUsuario = "UPDATE `usuario` 
	SET matricula = $novaMatricula
	WHERE matricula = $matriculaAntiga";
	$link->query($updateAlunoComoUsuario);


	$sql = "SELECT * FROM `alunos` WHERE matricula = $novaMatricula";
	$result = $link->query($sql);

	$row = $result->fetch_assoc();
    echo json_encode($row);
	mysqli_close($link);
?>