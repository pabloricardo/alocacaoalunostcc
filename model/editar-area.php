<?php
	require 'config.php';
	require 'connection.php';
	$link = DBConnect();

	$id_area = $_POST['id-area'];
	$editar_nome = $_POST['editar-nome'];


//$sql="UPDATE {$tbl_name} SET state='{$state}', zip='{$zip}' WHERE custnum='{$custnum}'" $novoCpf = $_POST['editar-cpf']; CPF = '{$novoCpf}';

	$update = "UPDATE `area` 
	SET nome_da_area = '$editar_nome' 
	WHERE id_area = $id_area";
	$alterar = $link->query($update);


	$sql = "SELECT * FROM `area` WHERE id_area = $id_area";
	$result = $link->query($sql);

	$row = $result->fetch_assoc();
    echo json_encode($row);
	mysqli_close($link);
?>