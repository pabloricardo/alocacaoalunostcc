<?php

require '../view/config.php';
require '../view/connection.php';

$nome = $_POST['nome'];
$matricula = $_POST['matricula'];
$email = $_POST['email'];
$disciplina = $_POST['disciplina'];
$semestre_letivo = strtr($_POST['semestre_letivo'], '/', '-');
$semestre_letivo = date('Y-m-d', strtotime($semestre_letivo));
$area = $_POST['area'];
$quantidade_orientacoes = $_POST['quantidade_orientacoes'];

$link = DBConnect();

$query = "insert into professores (nome, matricula, email, disciplina, semestre_letivo, area, quantidade_orientacoes) 
values ('$nome' , $matricula, '$email', '$disciplina', '$semestre_letivo','$area', $quantidade_orientacoes)";

if(mysqli_query($link, $query)){ 
	$retorno = array('mensagem' => "Professor Cadastrado com Sucesso", 'status' => true);
} else{ 
	$retorno = array('mensagem' => "Matrícula Já Cadastrada");
} 
    echo json_encode($retorno);
	mysqli_close($link);
?>