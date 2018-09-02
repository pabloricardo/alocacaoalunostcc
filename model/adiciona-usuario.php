<?php

require '../view/config.php';
require '../view/connection.php';

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$dtNascimento = strtr($_POST['dtNascimento'], '/', '-');
$dtNascimento = date('Y-m-d', strtotime($dtNascimento));
$sexo = $_POST['sexo'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];
$email = $_POST['email'];

$link = DBConnect();

$query = "insert into pessoa (CPF, Sexo, Telefone, Email, Nome, DataNascimento, Senha) 
values ($cpf , '$sexo', '$telefone', '$email', '$nome', '$dtNascimento','$senha')";

if(mysqli_query($link, $query)){ 
	$retorno = array('mensagem' => "Usuário Cadastrado com Sucesso", 'status' => true);
} else{ 
	$retorno = array('mensagem' => "Usuário Não Pode Ser Cadastrado, Dados Incorretos ou CPF Já Cadastrado");
} 
    echo json_encode($retorno);
mysqli_close($link);
?>