<?php

require '../view/config.php';
require '../view/connection.php';

$nome = $_POST['nome'];
$matricula = $_POST['matricula'];
$email = $_POST['email'];

$link = DBConnect();

$query = "insert into alunos (nome, matricula, email ) 
values ('$nome' , $matricula, '$email')";


if($link->query($query)){ 
	$retorno = array('mensagem' => "Cadastrado com Sucesso", 'status' => true);
} else{ 
	$retorno = array('mensagem' => "Matrícula Já Cadastrada");
} 
    echo json_encode($retorno);
	mysqli_close($link);
?>