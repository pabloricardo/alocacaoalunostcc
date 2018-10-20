<?php

require 'config.php';
require 'connection.php';
session_start();

$senha = $_POST['senha'];
$matricula = $_SESSION['matricula'];

$link = DBConnect();

$query = "UPDATE usuario
SET senha = $senha
WHERE matricula = $matricula";

$link->query($query);


if($link->query($query)){ 
	$retorno = array('mensagem' => "Cadastrado com Sucesso", 'status' => true);
} else{ 
	$retorno = array('mensagem' => "Matrícula Já Cadastrada");
} 
    echo json_encode($retorno);
	mysqli_close($link);
?>