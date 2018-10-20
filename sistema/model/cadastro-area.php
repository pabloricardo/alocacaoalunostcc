<?php

require 'config.php';
require 'connection.php';

$nome = $_POST['nome'];

$link = DBConnect();

$query = "insert into area (nome_da_area) 
values ('$nome')";

if($link->query($query)){ 
	$retorno = array('mensagem' => "Cadastrado com Sucesso", 'status' => true);
} else{ 
	$retorno = array('mensagem' => "Não foi possível cadastrar");
} 
    echo json_encode($retorno);
	mysqli_close($link);
?>