<?php
	require '../view/config.php';
	require '../view/connection.php';
	$link = DBConnect();

	$cpf = $_POST['cpf-antigo'];

	$novoCpf = $_POST['editar-cpf']; 
	$nome = $_POST['editar-nome'];
	$sexo = $_POST['editar-sexo'];
	$email = $_POST['editar-email'];
	$telefone = $_POST['editar-telefone'];
	$dtNascimento = $_POST['editar-dtNascimento'];
	


//$sql="UPDATE {$tbl_name} SET state='{$state}', zip='{$zip}' WHERE custnum='{$custnum}'" $novoCpf = $_POST['editar-cpf']; CPF = '{$novoCpf}';

	$update = "UPDATE `pessoa` SET CPF = '{$novoCpf}', DataNascimento = '{$dtNascimento}', Nome = '{$nome}', Sexo = '{$sexo}', Nome = '{$nome}', Email = '{$email}', 
	Telefone = '{$telefone}' WHERE CPF = '$cpf'";
	$alterar = $link->query($update);


	$sql = "SELECT * FROM `pessoa` WHERE CPF = '$novoCpf'";
	$result = $link->query($sql);

	$row = $result->fetch_assoc();
    echo json_encode($row);
	mysqli_close($link);
?>